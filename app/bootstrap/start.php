<?php
ini_set('display_errors', 1);
error_reporting(-1);

/**
 * Create the main Tweech class
 * @var Raideer\Tweech\Tweech
 */
$app = new Raideer\Tweech\Tweech;

/**
 * Binding the app to the container so we can access the App facade
 */
$app->addToInstance('app', $app);


use Raideer\Tweech\Facades\FacadeLoader;
use Raideer\Tweech\Config\ConfigLoader;
use Monolog\Logger as MonologLogger;
use Raideer\Tweech\Facades\Facade;
use Raideer\Tweech\Config\Config;
use Raideer\Tweech\Util\Logger;
use Raideer\Tweech\Api\Wrapper;

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
 * Add the application instance to the facade
 */
Facade::setApplication($app);
$loader = with(new FacadeLoader($app['config']['app.facades']))->load();

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
                    $app['config']['app.dailyLogLimit']);
}else{
  $app['logger']->logToFiles($app['path.app'] . "/logs/tweech.log");
}

/**
 * Attaching the Twitch API Wrapper to the container
 * $app['api']->method() or Api::method();
 */
$app->addToInstance('api', new Wrapper);

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
