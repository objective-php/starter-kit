<?php

namespace Project;

/**
 * The AppNamesapce namespace should be changed to whatever fit your project
 *
 * Many modern IDEs offer powerful refactoring features that should make this
 * renaming operation painless
 */

use ObjectivePHP\Application\AbstractApplication;
use ObjectivePHP\Application\Operation\ActionRunner;
use ObjectivePHP\Application\Operation\RequestWrapper;
use ObjectivePHP\Application\Operation\ResponseInitializer;
use ObjectivePHP\Application\Operation\ResponseSender;
use ObjectivePHP\Application\Operation\ServiceLoader;
use ObjectivePHP\Application\Operation\ViewRenderer;
use ObjectivePHP\Application\Operation\ViewResolver;
use ObjectivePHP\Application\View\Helper\Vars;
use ObjectivePHP\Application\Workflow\Filter\UrlFilter;
use ObjectivePHP\Cli\Router\CliRouter;
use ObjectivePHP\Package\FastRoute\FastRouteRouter;
use ObjectivePHP\Router\Dispatcher;
use ObjectivePHP\Router\MetaRouter;
use ObjectivePHP\Router\PathMapperRouter;
use Project\Cli\HelloWorld;
use Project\Cli\Test;
use Project\Cli\Worker2 as Worker;
use Project\Middleware\LayoutSwitcher;
use Project\Package\Example\ExamplePackage;

/**
 * Class Application
 *
 * @package Showcase
 */
class Application extends AbstractApplication
{
    public function init()
    {

        // register packages autoloading
        $this->getAutoloader()->addPsr4('Project\\Package\\', 'packages/');

        // define middleware endpoints
        $this->addSteps('init', 'bootstrap', 'route', 'action', 'rendering', 'end');


        // initialize request and response
        $this->getStep('init')
            // handle request and response
            ->plug(new RequestWrapper())->as('request-wrapper')
            ->plug(new ResponseInitializer())->as('response-initializer');

        $this->importPackages();

        // route request (this is done after packages have been loaded)
        $router = new MetaRouter([new PathMapperRouter(), new FastRouteRouter()]);

        // integrates CLI commands
        $cliRouter = new CliRouter();
        $cliRouter->registerCommand(HelloWorld::class);
        $cliRouter->registerCommand(Test::class);
        $cliRouter->registerCommand(Worker::class);
        $router->register($cliRouter);

        $this->getStep('route')->plug($router)->as('router');


        // load framework native middleware
        $this->getStep('bootstrap')->plug(ServiceLoader::class)->asDefault('service-loader');

        // give access to config everywhere, including views
        //
        // Note: this is used by default layouts
        $this->getStep('bootstrap')->plug(function ($app) {
            Vars::$config = $app->getConfig();
        });

        // the dispatcher will actually run the matched route
        $this->getStep('route')->plug(new Dispatcher())->as('dispatcher');


        // handle view rendering

        $this->getStep('rendering')
            ->plug(LayoutSwitcher::class, new UrlFilter('/'))
            ->plug(new ViewResolver())->as('view-resolver')
            ->plug(new ViewRenderer())->as('view-renderer');

        $this->getStep('end')->plug(new ResponseSender());

    }

    /**
     * Gather all packages activation stuff
     *
     * @throws \ObjectivePHP\Application\Exception
     */
    public function importPackages()
    {

        $this->getStep('bootstrap')
            // load external packages
            ->plug(ExamplePackage::class);

    }

}


