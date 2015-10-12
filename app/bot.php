<?php
/**
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function()
{
  /**
   * Join a channel
   */

  Client::command("JOIN", "#lirik");

  Logger::info('Joined liriks channel');
});

/**
 * Listen to the 'irc.message.PRIVMSG' event
 * @var Raideer\Tweech\Event\IrcMessageEvent
 */
Client::listen("irc.message.PRIVMSG", function($event)
{
    $message = $event->getMessage();

    echo $message['username'] . ": " . $message['message'] . "\n";
});
