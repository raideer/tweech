<?php

/**
 * Register the Composer autoloader
 */
require __DIR__.'/vendor/autoload.php';


/**
 * Require the application entry point so we can run it
 * @var Tweech
 */
$app = require_once __DIR__ . "/app/bootstrap/start.php";

/**
 * Run the application
 */
$app->run();
