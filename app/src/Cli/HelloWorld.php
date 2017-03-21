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

        $this->expects(new Param(['s' => 'surname'], 'Your surname'));
        $this->expects(new Argument('test', 'test arg', Argument::MANDATORY));
        $this->expects(new Argument('test2', 'test arg'));

        $this->expects(new Param(['n' => 'name'], 'Your name', Param::MANDATORY));
    }
    
    /**
     * @param ApplicationInterface $app
     */
    public function run(ApplicationInterface $app)
    {
        $c = new CLImate();
        $c->out(sprintf("Hello, <green><blink>%s</blink></green>", $this->getParam('n')));
        $c->out(sprintf("Hello, <red>%s</blink></red>", $this->getParam('test')));
    }
    
}
