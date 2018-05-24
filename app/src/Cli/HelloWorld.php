<?php

namespace Project\Cli;

use League\CLImate\CLImate;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\Cli\Action\Parameter\Argument;
use ObjectivePHP\Cli\Action\Parameter\Param;

/**
 * Class HelloWorld
 *
 * @package Project\Cli
 */
class HelloWorld extends AbstractCliAction
{
    protected $command = 'hello';

    protected $description = 'Greet any friend!';

    /**
     * HelloWorld constructor.
     *
     * @throws \ObjectivePHP\Cli\Action\Parameter\ParameterException
     */
    public function __construct()
    {
        $this->expects(new Argument('name', 'Who should I greet?', Param::MANDATORY));
    }

    /**
     * {@inheritdoc}
     */
    public function run(ApplicationInterface $app, CLImate $console = null)
    {
        $name = $this->getParam('name');

        $console->out('Hello, ' . $name);
    }
}
