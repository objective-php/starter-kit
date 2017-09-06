<?php

namespace Config;

use ObjectivePHP\Application\Config\ActionNamespace;
use ObjectivePHP\Application\Config\ApplicationName;
use ObjectivePHP\Application\Config\LayoutsLocation;
use ObjectivePHP\Application\Config\Param;
use ObjectivePHP\Matcher\Matcher;
use ObjectivePHP\Package\WebSocketServer\Command\WebSocketServer;
use ObjectivePHP\Package\WebSocketServer\Config\WebSocketServerConfig;
use ObjectivePHP\ServicesFactory\Config\Service;
use Project\WebSocket\WsListener;

return [
    new ApplicationName('Project Template'),
    new ActionNamespace('Project\\Action'),
    new LayoutsLocation('app/layouts'),
    new WebSocketServerConfig([WsListener::class])
];
