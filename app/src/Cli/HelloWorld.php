<?php

namespace Project\Cli;

use League\CLImate\CLImate;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\Cli\Action\Parameter\Argument;
use ObjectivePHP\Cli\Action\Parameter\Param;
use ObjectivePHP\Cli\Action\Parameter\Toggle;

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
	    $this->setDescription('Sample command that kindly greets the user');
        $this->expects(new Param('name', 'Your name', Param::MANDATORY));
    }
    
    /**
     * @param ApplicationInterface $app
     */
    public function run(ApplicationInterface $app)
    {
        $c = new CLImate();
        $c->out(sprintf("Hello, <green><blink>%s</blink></green>", $this->getParam('name')));
    }
    
}
