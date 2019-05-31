<?php

namespace Project;

/**
 * The AppNamespace namespace should be changed to whatever fit your project
 *
 * Many modern IDEs offer powerful refactoring features that should make this
 * renaming operation painless
 */

use ObjectivePHP\Cli\Application\AbstractCliApplication;
use ObjectivePHP\Middleware\Action\PhtmlAction\PhtmlActionPackage;
use ObjectivePHP\Router\RouterPackage;
use Project\Package\Example\ExamplePackage;

/**
 * Class CliApplication
 *
 * @package Project
 */
class CliApplication extends AbstractCliApplication
{
    public function init()
    {
        // register Phtml action package
        $this->registerPackage(new PhtmlActionPackage());

        // register default router package
        $this->registerPackage(new RouterPackage());

        // register local example package
        $this->registerPackage(new ExamplePackage());
    }
}
