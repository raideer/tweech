<?php
/**
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function()
{
  /**
   * Join a channel
   */
  Client::joinChannel("lirik");

  /**
   * Put a Kappa in the chat
   */
  Client::chat("Kappa");
});

/**
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen("chat.message", function($event)
{
  echo $event->getSender() . ": " .$event->getMessage(). "\n";
});
