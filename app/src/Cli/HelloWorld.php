<?php

namespace Project\Cli;

use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\Cli\Action\Parameter\Param;

/**
 * Class HelloWorld
 *
 * @package Project\Cli
 */
class HelloWorld extends AbstractCliAction
{
    /**
     * HelloWorld constructor.
     */
    public function __construct()
	{
	    $this->setCommand('hello');
		$this->expects(new Param('name', 'Your name', Param::MANDATORY));
	}
    
    /**
     * @param ApplicationInterface $app
     */
    public function run(ApplicationInterface $app)
    {
        printf("Hello, %s", $this->getParam('name'));
    }
    
}
