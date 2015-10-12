<?php

class TweechCommand extends ChatCommand{

  public function getCommand(){

    return "tweech";
  }

  public function run($event){

    echo "Hello";
  }
}
