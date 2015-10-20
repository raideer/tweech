<?php

class TweechCommand extends ChatCommand{

  public function getCommand(){
    return "tweech";
  }

  public function getCommandIdentifier(){
    return array('!');
  }

  public function run($args){

    echo "Hello";
  }
}
