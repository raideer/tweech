<?php

namespace App\Commands;

class TweechCommand implements \Raideer\Tweech\Command\CommandInterface
{
    public function getCommand()
    {
        return 'tweech';
    }

    public function run($event)
    {
        $message = $event->getCommand();

        $sender = $event->getSender();

        if ($sender->isSubscribed()) {
            $event->getChat()->message('Hello! Kappa');
        } else {
            $event->getChat()->message('Hello!');
        }
    }
}
