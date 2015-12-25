<?php

namespace App\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Raideer\Tweech\Subscribers\EventSubscriber;

abstract class Subscriber implements EventSubscriberInterface{

  public static function getSubscribedEvents(){
    return [];
  }
  
}
