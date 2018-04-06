<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use App\Doctrine\Repository;
use App\Domain\Task;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AssignHorses extends Command
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

    public function __construct(Repository\Knights $knights, Task\ChooseHorseInStable $chooseHorseInStable, ObjectManager $manager)
    {
        $this->knights = $knights;
        $this->chooseHorseInStable = $chooseHorseInStable;
        $this->manager = $manager;

        parent::__construct('application:horses:assign');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->knights->all() as $knight) {
            ($this->chooseHorseInStable)($knight);

            $this->manager->flush();
        }
    }
}
