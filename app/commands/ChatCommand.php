<?php
use Raideer\Tweech\Command\CommandInterface;

class Command implements CommandInterface{

  /**
   * Get the name of the command
   * @return string Return the name of the chat command
   */
  public function getCommand(){

    /**
     * return "help";
     * Will listen for !help or .help
     */

    return null;
  }

  public function getCommandIdentifier(){

    return array(".", "!");
  }

  /**
   * Runs when the command has been typed in
   * @param  Raideer\Tweech\Event\Event $message Returns the event with the details
   * @return void
   */
  public function run(Raideer\Tweech\Event\Event $message){

  }

}
