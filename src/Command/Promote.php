<?php

declare(strict_types=1);

namespace App\Command;

use App\Doctrine\Repository\Knights;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Workflow\Registry;

final class Promote extends Command
{
    /**
     * @var Registry
     */
    private $workflows;

    /**
     * @var Knights
     */
    private $knights;

    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(
        Registry $workflows,
        Knights $knights,
        ObjectManager $manager
    ) {
        $this->workflows = $workflows;
        $this->knights   = $knights;
        $this->manager   = $manager;

        parent::__construct('application:knight:promote');
    }

    public function configure(): void
    {
        $this
            ->addArgument('knight_identifier', InputArgument::REQUIRED)
        ;
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $knight = $this->knights->find($input->getArgument('knight_identifier'));

        if (null === $knight) {
            throw new \Exception('Knight not found.');
        }

        $workflow = $this->workflows->get($knight);

        foreach ($workflow->getEnabledTransitions($knight) as $transition) {
            $workflow->apply($knight, $transition->getName());

            $this->manager->flush();

            return;
        }
    }
}
