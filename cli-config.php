<?php

namespace Project;

use Doctrine\ORM\Tools\Console\ConsoleRunner;

chdir(__DIR__);

$autoloader = require 'vendor/autoload.php';


$app = new Application($autoloader);

$app->loadConfig('app/config');
ob_start();
$app->run();
ob_get_clean();

$em = $app->getServicesFactory()->get('doctrine.em.default');
return ConsoleRunner::createHelperSet($em);
