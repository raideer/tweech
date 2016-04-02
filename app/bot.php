<?php

use App\Commands\TestCommand;
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

    $chat = Client::joinChat('raideeeeer');
    $chat->addCommand(new TestCommand);
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

/*
 * Listen to the 'chat.subscription' event
 * @var Raideer\Tweech\Event\NewSubscriptionEvent
 */
Client::listen('chat.subscription', function ($event) {
    if ($event->getChatName() == 'testchannel') {
        if ($event->isResub()) {
            $event->getChat()->message("{$event->getUser()} just resubscribed for {$event->getMonths()} in a row!");
        } else {
            $event->getChat()->message("{$event->getUser()} just subscribed!");
        }
    }
});
