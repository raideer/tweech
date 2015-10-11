<?php
use Raideer\Tweech\Event\EventSubscriber;

class MotdSubscriber extends EventSubscriber{

  public static function getSubscribedEvents(){
    return array(
      "irc.message.RPL_MOTD" => array(
        "receivedMessageOfTheDay", 0
      )
    );
  }

  public function receivedMessageOfTheDay($event){


  }

}
