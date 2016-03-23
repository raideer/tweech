<?php

use App\Commands\TweechCommand;
use App\Listeners\MotdListener;

/*
 * Gets executed when the client has connected to the IRC server
 */
Client::whenLogged(function () {

    /*
    * Registering an MotdListener (see app/listeners/MotdListener)
    */
    Client::registerEventListener(new MotdListener);

    /*
    * Joining a channel/chat
    */
    $chat = Client::joinChat('lirik');
    // $chat->addCommand(new TweechCommand);
    $chat->read();

});

/*
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen('chat.message', function ($event) {
    $sender = $event->getSender();

    if ($sender->isSubscribed()) {
        echo $event->getMessage() . PHP_EOL;
    }
});

Client::listen('chat.subscription', function ($event) {
    if ($event->isResub()) {
        echo "\n---SOMEONE JUST RESUBSCRIBED---\n\n";
    } else {
        echo "\n---SOMEONE JUST SUBSCRIBED---\n\n";
    }
});
