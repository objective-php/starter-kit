<?php
/**
 * This file is part of the Objective PHP project
 *
 * More info about Objective PHP on www.objective-php.org
 *
 * @license http://opensource.org/licenses/GPL-3.0 GNU GPL License 3.0
 */

namespace Project\Cli;


use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Cli\Action\AbstractCliAction;
use ObjectivePHP\Cli\Action\Parameter\Toggle;

class Test extends AbstractCliAction
{
    protected $command = 'test';
    
    /**
     * Test constructor.
     *
     * @param string $command
     */
    public function __construct()
    {
        $this->expects(new Toggle(['v' => 'verbose'], 'Verbose output'));
    }
    
    
    public function run(ApplicationInterface $app)
    {
        echo "TEST" . PHP_EOL;
        
        if($this->getParam('verbose') >= 1)
        {
            echo 'VERBOSE ON' . PHP_EOL;
        }
            
        if($this->getParam('verbose') >= 2)
        {
            echo 'EXTRA VERBOSE ON' . PHP_EOL;
        }
            
            
    }
    
}
