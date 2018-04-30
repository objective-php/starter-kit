<?php

use Project\Application;

    $autoloader = require '../vendor/autoload.php';

    chdir(dirname(__DIR__));

    $app = new Application($autoloader);

    $app->setEnv(getenv('APPLICATION_ENV') ?: 'production');

    $app->run();
