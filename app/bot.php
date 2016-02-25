<?php

use App\Commands\TweechCommand;
use App\Subscribers\MotdSubscriber;

/*
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function () {

  /*
   * Registering an MotdSubscriber (see app/subsribers/MotdSubscriber)
   */
  Client::registerEventSubscriber(new MotdSubscriber());

  /*
   * Joining a channel/chat
   */
  $chat = Client::joinChat("lirik");
  // $chat->addCommand(new TweechCommand);
  $chat->read();

});

/**
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen('irc.message', function ($event) {
  print_r($event->getResponse());
});
