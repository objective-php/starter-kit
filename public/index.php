<?php

use Project\Application;
use Project\CliApplication;

$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';

chdir(dirname(__DIR__));

$app = (php_sapi_name() == 'cli') ? new CliApplication() : new Application($autoloader);

$app->setEnv(getenv('APPLICATION_ENV') ?: 'production');

$app->run();
