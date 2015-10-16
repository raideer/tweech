<?php
/**
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function()
{
  /**
   * Join a channel
   */
  $chat = Client::joinChat("raideeeeer");
  $chat->read();

});

/**
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen("chat.message", function($event)
{
  echo $event->getChat()->getName() . " \t ". $event->getSender() .": " .$event->getMessage(). "\n";
});
