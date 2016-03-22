<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
 * Create the main Tweech class
 * @var Raideer\Tweech\Tweech
 */
$app = new Raideer\Tweech\Tweech();

/*
 * Binding the app to the container so we can access the App facade
 */
$app->applyInstance('app', $app);

use Monolog\Logger as MonologLogger;
use Raideer\Tweech\Config\Config;
use Raideer\Tweech\Config\ConfigLoader;
use Raideer\Tweech\Facades\Facade;
use Raideer\Tweech\Facades\FacadeLoader;
use Raideer\Tweech\Util\Logger;
use Raideer\TwitchApi\Wrapper; //github.com/raideer/twitch-api

/*
 * Save application paths to the container
 */
$app->saveApplicationPaths(require __DIR__.'/paths.php');

/*
 * Creates a new config loader and specifies the config directory
 * @var ConfigLoader
 */
$configLoader = new ConfigLoader($app['path.config']);

/*
 * Attaching the Config class to the container
 */
$app->applyInstance('config', new Config($configLoader));

/*
 * Add the application instance to the facade
 */
Facade::setApplication($app);
$loader = with(new FacadeLoader($app['config']['app.facades']))->load();

/*
 * Set the default timezone
 */
date_default_timezone_set($app['config']['app.timezone']);

$app->applyInstance('logger', new Logger(
                                  new MonologLogger('Tweech')
                              ));
if ($app['config']['app.dailyLogs']) {
    $app['logger']->logToDailyFiles(
                    $app['path.storage'].'/logs/tweech.log',
                    $app['config']['app.dailyLogLimit']);
} else {
    $app['logger']->logToFiles($app['path.storage'].'/logs/tweech.log');
}

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    echo "[$errno] $errstr in $errfile on line $errline".PHP_EOL;
    $app['logger']->error(
    "[$errno] $errstr in $errfile on line $errline"
    );
}, E_ALL);

$app['logger']->info('------ Logger loaded ------');

/*
 * Attaching the Twitch API Wrapper to the container
 * $app['api']->method() or Api::method();
 */

$app->applyInstance('api', new Wrapper(new GuzzleHttp\Client()));

/*
 * Runs the contents when the app has booted
 * @var void
 */
$app->whenBooted(function () use ($app) {

    $botClass = $app['path.app'].'/bot.php';
    if (file_exists($botClass)) {
        require $botClass;
    }

    $app['client']->listen('irc.message.RPL_WELCOME', function () use ($app) {
        $app['logger']->info('Successfuly joined the IRC server');
    });

});

/*
 * Return the application instance
 */
return $app;
