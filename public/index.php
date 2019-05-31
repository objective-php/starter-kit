<?php

use Project\Engine;
use Project\HttpApplication;
use Project\CliApplication;

$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';

chdir(dirname(__DIR__));
$env = getenv('APPLICATION_ENV') ?: 'production';
if ($env == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

try {
    $engine = new Engine($env, $autoloader);
    $engine->registerHttpApplication(HttpApplication::class);
    $engine->registerCliApplication(CliApplication::class);
    $engine->run();
} catch (Throwable $e) {


    if ($env == 'dev') {
        ob_end_clean();
        throw $e;
    }
}
