<?php
namespace App\Subscribers;

/**
 * This class is an example how Subscribers work and how to use them.
 *
 *
 */
class MotdSubscriber extends Subscriber{

  public static function getSubscribedEvents(){
    return [
      "irc.message.RPL_MOTD" => [
        "receivedMessageOfTheDay", 0
      ]
    ];
  }

  public function receivedMessageOfTheDay($event){

    echo "Hello Twitch! \n";

  }

}
