<?php

namespace App\Commands;

class TestCommand implements \Raideer\Tweech\Command\CommandInterface
{
    public function getCommand()
    {
        return 'mps';
    }

    public function run($event)
    {
        $sender = $event->getSender();

        $mps = $event->getChat()->getMessagesPerSecond();

        $event->getChat()->message("@{$sender->getName()} Messages per second: $mps");
    }
}
