<?php
$client = $app['client'];

/**
 * Run when the client has connected to the IRC server
 */
$client->whenLogged(function() use($client){

  /**
   * Join a channel
   */
  $client->command("JOIN", "#lirik");
});

/**
 * Listen to the 'irc.message.PRIVMSG' event
 * @var Raideer\Tweech\Event\IrcMessageEvent
 */
$client->listen("irc.message.PRIVMSG", function($event){

    $message = $event->getMessage();

    echo $message['username'] . ": " . $message['message'] . "\n";
});
