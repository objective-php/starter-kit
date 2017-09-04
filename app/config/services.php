<?php

use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\ServicesFactory\Annotation\Inject;
use ObjectivePHP\ServicesFactory\Config\Service;
use ObjectivePHP\Matcher\Matcher;
use Project\Action\Api\TestV1;

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
        ]),
        new Service(['id' => 'cli', 'factory' => function () {
            return new class extends AbstractCliAction {
    
                /**
                 * @Inject(service="matcher")
                 */
                protected $matcher;
                
                public function __construct()
                {
                    $this->setCommand('test');
                    $this->setDescription('Test action');
                }
            
                
                public function run(ApplicationInterface $app)
                {
                    (new \League\CLImate\CLImate())->dump($this->matcher);
                    
                }
    
            };
        }])
    ];
