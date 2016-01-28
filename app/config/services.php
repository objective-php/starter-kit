<?php

use ObjectivePHP\ServicesFactory\Config\Service;
use ObjectivePHP\Matcher\Matcher;

    /**
     * Declare your services specifications here
     */

    return [
        // Example service declaration
        //
        // call $servicesFactory->get('matcher') to build an instance of Matcher
        new Service([
            'id' => 'matcher',
            'class' => Matcher::class
        ])
    ];