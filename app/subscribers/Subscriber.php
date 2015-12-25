<?php

namespace App\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class Subscriber implements EventSubscriberInterface{

  public static function getSubscribedEvents(){
    return [];
  }

}
