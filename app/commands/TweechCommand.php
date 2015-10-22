<?php

class TweechCommand implements \Raideer\Tweech\Command\CommandInterface{

  public function getCommandIdentifier()
  {
    return array('!');
  }

  public function getCommand()
  {
    return "tweech";
  }

  public function run($event)
  {
    $message = remove_command_str($event->getMessage(), "!tweech");
    if($message == "Kappa"){
      $event->getChat()->message("Hello! Kappa");
    }else{
      $event->getChat()->message("Hello!");
    }
  }
}
