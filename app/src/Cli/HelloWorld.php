<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 15/05/2018
 * Time: 14:44
 */

namespace Project\Cli;


use League\CLImate\CLImate;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\Cli\Action\Parameter\Argument;
use ObjectivePHP\Cli\Action\Parameter\Param;

class HelloWorld extends AbstractCliAction
{

    protected $command = 'hello';

    protected $description = 'Greet any friend!';

    public function __construct()
    {
        $this->expects(new Argument('name', 'Who should I greet?', Param::MANDATORY));
    }


    /**
     * @param ApplicationInterface $app
     * @return mixed
     */
    public function run(ApplicationInterface $app, CLImate $console = null)
    {
        $name = $this->getParam('name');

        $console->out('Hello, ' . $name);
    }

}