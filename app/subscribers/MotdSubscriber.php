<?php
namespace App\Subscribers;

/**
 * This is an example how Subscribers work and how to use them.
 *
 * This class will output "Hello Twitch!" in console whenever Twitch IRC server
 * sends us MOTD (Message Of The Day)
 */
class MotdSubscriber extends Subscriber{

  /**
   * Here we tell the dispatcher what events this class is subscribing to.
   * In this example, we are subscribing to the 'irc.message.RPL_MOTD' event.
   *
   * Inside the inner array we tell what functions to execute, when the event is
   * dispatched. It must contain the name of the function and the priority.
   * The higher the priority, the earlier the function gets called.
   *
   * @return array
   */
  public static function getSubscribedEvents(){
    return [
      "irc.message.RPL_MOTD" => [
        ["receivedMessageOfTheDay", 0]
      ]
    ];
  }

  /**
   * @param  IrcMessageEvent $event
   * @return void
   */
  public function receivedMessageOfTheDay($event){

    echo "MOTD: {$event->getResponse()['motd']}\n";

  }

}
