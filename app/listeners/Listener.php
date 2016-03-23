<?php

namespace App\Listeners;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class Listener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [];
    }
}
