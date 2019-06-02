<?php

use Project\CliApplication;
use Project\Engine;
use Project\HttpApplication;

$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';

chdir(dirname(__DIR__));
$env = getenv('APPLICATION_ENV') ?: 'production';
if ($env == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$engine = new Engine($env, $autoloader);
$engine->registerHttpApplication(HttpApplication::class);
$engine->registerCliApplication(CliApplication::class);
$engine->run();
