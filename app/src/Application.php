<?php

namespace Project;

/**
 * The AppNamespace namespace should be changed to whatever fit your project
 *
 * Many modern IDEs offer powerful refactoring features that should make this
 * renaming operation painless
 */

use ObjectivePHP\Application\AbstractHttpApplication;
use ObjectivePHP\Middleware\Action\PhtmlAction\ExceptionHandler\DefaultExceptionRenderer;
use ObjectivePHP\Middleware\Action\PhtmlAction\PhtmlActionPackage;
use Project\Package\Example\ExamplePackage;

/**
 * Class Application
 *
 * @package Project
 */
class Application extends AbstractHttpApplication
{
    public function init()
    {
        $this->getExceptionHandlers()
            ->registerMiddleware(new DefaultExceptionRenderer());

        // register Phtml action package
        $this->registerPackage(new PhtmlActionPackage());
        $this->registerPackage(new ExamplePackage());
    }
}
