<?php

$client = $app['client'];

$client->listen("irc.message.RPL_ENDOFMOTD", function($event){
    // echo "End of MOTD\n";
});
