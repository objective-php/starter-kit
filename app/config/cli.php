<?php

use ObjectivePHP\Cli\Config\CliCommand;
use ObjectivePHP\ServicesFactory\ServiceReference;
use Project\Cli\HelloWorld;
use Project\Cli\WebSocketServer;

return [
  new CliCommand(HelloWorld::class),
  new CliCommand(new ServiceReference('cli'))
];
