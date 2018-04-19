<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Domain\Task\ChooseHorseInStable;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;

final class KnightWorkflowSubscriber implements EventSubscriberInterface
{
    /**
     * @var ChooseHorseInStable
     */
    private $chooseHorseInStable;

    public function __construct(ChooseHorseInStable $chooseHorseInStable)
    {
        $this->chooseHorseInStable = $chooseHorseInStable;
    }

    public function assignHorse(Event $event): void
    {
        $knight = $event->getSubject();

        ($this->chooseHorseInStable)($knight);
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.knightifier.entered.knight' => 'assignHorse',
        ];
    }
}
