<?php

return [
    'timezone' => 'UTC',

    /*
    * Creates a new log file every day
    *
    * If false then everything will be logged into a single file
    */
    'dailyLogs' => true,

    /*
    * Specify the file amount limit for daily logs
    *
    * 0 for unlimited
    */
    'dailyLogLimit' => 0,

    'connection' => [
        /*
        * Specify the twitch username for the bot
        */
        'username' => 'raideeeeer',
        // 'username' => 'powerbot5000',

        /*
        * Specify the Twitch chat OAuth password
        *
        * You can get your token here: http://www.twitchapps.com/tmi
        */
        'oauth' => 'oauth:org68x7wbizbs5pbjc2spdbhxetudc',
        // 'oauth' => 'oauth:3b7hmz1kqf7ndt9olku1ghvqh7hknw',

        /*
        * Irc server information
        */
        'ircServer' => [

            'hostname' => 'irc.chat.twitch.tv',
            'port'     => 6667,

        ],
    ],

    'facades' => [
        'Api'           => \Raideer\Tweech\Facades\Api::class,
        'Application'   => \Raideer\Tweech\Facades\App::class,
        'Client'        => \Raideer\Tweech\Facades\Client::class,
        'Config'        => \Raideer\Tweech\Facades\Config::class,
        'Logger'        => \Raideer\Tweech\Facades\Logger::class,
    ],

];
