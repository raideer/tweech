<?php
error_reporting(E_ALL);

/**
 * Create the main Tweech class
 * @var Raideer\Tweech\Tweech
 */
$app = new Raideer\Tweech\Tweech;

/**
 * Binding the app to the container so we can access the App facade
 */
$app->addToInstance('app', $app);


use Raideer\Tweech\Config\Config;
use Raideer\Tweech\Config\ConfigLoader;
use Raideer\Tweech\Facades\Facade;
use Raideer\Tweech\Facades\FacadeLoader;
use Raideer\Tweech\Util\Logger;
use Monolog\Logger as MonologLogger;

/**
 * Save application paths to the container
 */
$app->saveApplicationPaths(require __DIR__ . "/paths.php");

/**
 * Creates a new config loader and specifies the config directory
 * @var ConfigLoader
 */
$configLoader = new ConfigLoader($app['path.config']);

/**
 * Attaching the Config class to the container
 */
$app->addToInstance('config', new Config($configLoader));

/**
 * Set the default timezone
 */
date_default_timezone_set($app['config']['app.timezone']);

$app->addToInstance('logger', new Logger(
                                  new MonologLogger('Tweech')
                              ));

if($app['config']['app.dailyLogs'])
{
  $app['logger']->logToDailyFiles(
                    $app['path.app'] . "/logs/tweech.log",
                    $app['config']['app.dailyLogLimit']
                  );
}else{
  $app['logger']->logToFiles(
                    $app['path.app'] . "/logs/tweech.log"
                  );
}


/**
 * Add the application instance to the facades
 */
Facade::setApplication($app);

$loader = new FacadeLoader($app['config']['facades']);
$loader->load();

/**
 * Runs the contents when the app has booted
 * @var void
 */
$app->whenBooted(function() use($app){

  $botClass = $app['path.app'] . "/bot.php";
  if(file_exists($botClass)) require $botClass;

});

/**
 * Return the application instance
 */
return $app;
