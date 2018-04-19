<?php

declare(strict_types=1);

namespace App\Command;

use App\Doctrine\Repository;
use App\Domain\Task;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AssignHorses extends Command
{
    /**
     * @var Repository\Knights
     */
    private $knights;

    /**
     * @var Task\ChooseHorseInStable
     */
    private $chooseHorseInStable;

    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(
        Repository\Knights $knights,
        Task\ChooseHorseInStable $chooseHorseInStable,
        ObjectManager $manager
    ) {
        $this->knights             = $knights;
        $this->chooseHorseInStable = $chooseHorseInStable;
        $this->manager             = $manager;

        parent::__construct('application:horses:assign');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        foreach ($this->knights->all() as $knight) {
            ($this->chooseHorseInStable)($knight);

            $this->manager->flush();
        }
    }
}
