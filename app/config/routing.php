<?php

use ObjectivePHP\Package\FastRoute\Config\FastRoute;
use ObjectivePHP\Router\Config\UrlAlias;
use Project\Action\Home;

return [
        // route aliasing
        new FastRoute('home', '/', Home::class)
];