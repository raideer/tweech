<?php

require_once __DIR__ . '/commands/TweechCommand.php';
/**
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function()
{
  /**
   * Join a channel
   */
  
  $chat = Client::joinChat("lirik");
  $chat->addCommand(new TweechCommand);
  $chat->read();

});

/**
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen("irc.message", function($event)
{
  print_r($event->getResponse());
});
