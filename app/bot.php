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

    $channels = [
        'sodapoppin',
        'lirik',
        'phantoml0rd',
        'PsiSyndicate',
        'AnomalyXd',
        'Food',
        'Yogscast',
        'LyndonFPS',
        'RiotGames',
        'MultiplayEsports',
        'CapcomFighters',
        'DreadzTV',
        'CopenhagenGamesCS',
        'raideeeeer'
    ];

    /*
    * Joining a channel/chat
    */
    //
    // foreach($channels as $channel){
    //     Client::joinChat(strtolower($channel))->read();
    // }

    $chat = Client::joinChat('raideeeeer');
    $chat->addCommand(new TestCommand);
    $chat->read();

    // Client::listen('tick.second', function() use($chat){
    //     $mps = $chat->getMessagesPerSecond();
    //     if ($mps > 5) {
    //         echo $chat->getMessagesPerSecond() . "\n";
    //     }
    // });

});

/*
 * Listen to the 'chat.message' event
 * @var Raideer\Tweech\Event\ChatMessageEvent
 */
Client::listen('chat.message', function ($event) {
    // $sender = $event->getSender();

    // if ($sender->isSubscribed()) {
    echo $event->getMessage() . PHP_EOL;
    // }
});

Client::listen('chat.subscription', function ($event) {
    if ($event->isResub()) {
        echo "\n---{$event->getUser()} JUST RESUBSCRIBED FOR {$event->getMonthsInARow()} MONTHS IN A ROW---\n\n";
    } else {
        echo "\n---{$event->getUser()} JUST SUBSCRIBED---\n\n";
    }

    if ($event->getChatName() == 'nmplol') {
        $event->getChat()->message('nmp1n nmp1n nmp1n nmp1n nmp1n nmp1n nmp1n');
    }
});
