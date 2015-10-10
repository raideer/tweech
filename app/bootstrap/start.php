<?php

/**
 * Create the main Tweech class
 * @var Raideer\Tweech\Tweech
 */
$app = new Raideer\Tweech\Tweech;

/**
 * Save application paths to the container
 */
$app->saveApplicationPaths(require __DIR__ . "/paths.php");

/**
 * Runs the contents when the app has booted
 * @var void
 */
$app->waitBooted(function() use($app){

  $botClass = $app['path.app'] . "/bot.php";
  if(file_exists($botClass)) require $botClass;

});

/**
 * Return the application instance
 */
return $app;
