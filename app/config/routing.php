<?php

use ObjectivePHP\Package\FastRoute\Config\FastRoute;
use ObjectivePHP\Router\Config\UrlAlias;
use Project\Action\Home;
use Project\Package\Example\Action\Example;

return [
        // route aliasing
        new FastRoute('home', '/', Home::class),
        new FastRoute('example', '/example', Example::class),
];