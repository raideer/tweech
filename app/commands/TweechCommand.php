<?php

namespace App\Commands;

class TweechCommand implements \Raideer\Tweech\Command\CommandInterface
{
<<<<<<< HEAD
  public function getCommand()
  {
    return "tweech";
  }

  public function run($event)
  {
    $message = $event->getCommand();

    if ($message == "Kappa") {
      $event->getChat()->message("Hello! Kappa");
    } else {
      $event->getChat()->message("Hello!");
=======
    public function getCommand()
    {
        return 'tweech';
    }

    public function run($event)
    {
        $message = remove_command_str($event->getMessage(), '!tweech');
        if ($message == 'Kappa') {
            $event->getChat()->message('Hello! Kappa');
        } else {
            $event->getChat()->message('Hello!');
        }
>>>>>>> 3586e71977506dd5af651ce32c7432dbba18aa2e
    }
}
