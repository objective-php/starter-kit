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
use ObjectivePHP\Router\RouterPackage;
use Project\Injector\UtilsInjector;
use Project\Package\Example\ExamplePackage;

/**
 * Class Application
 *
 * @package Project
 */
class HttpApplication extends AbstractHttpApplication
{
    public function init()
    {
        // register default exception handler
        $this->getExceptionHandlers()
            ->registerMiddleware(new DefaultExceptionRenderer());
    }

}
