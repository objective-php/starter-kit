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
use ObjectivePHP\Package\Doctrine\DoctrinePackage;
use ObjectivePHP\Package\FastRoute\FastRouteRouter;
use ObjectivePHP\Package\WebSocket\WebSocketPackage;
use ObjectivePHP\Package\WebSocketServer\WebSocketServerPackage;
use ObjectivePHP\Router\Dispatcher;
use ObjectivePHP\Router\MetaRouter;
use ObjectivePHP\Router\PathMapperRouter;
use Project\Cli\HelloWorld;
use Project\Cli\Test;
use Project\Middleware\LayoutSwitcher;
use Project\Package\Example\ExamplePackage;
use Project\WebSocket\WsListener;

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
        $router = new MetaRouter([new FastRouteRouter(), new PathMapperRouter()]);

        // integrates CLI commands
        $cliRouter = new CliRouter();
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
            ->plug(LayoutSwitcher::class, new UrlFilter('/'), function () { return (bool) rand(0, 1);})
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
            ->plug(ExamplePackage::class)
            // Uncomment below to activate Doctrine support for this application
            //
            // please note that if the Doctrine configuration does not match your local setup,
            // exceptions may be thrown on ObjectivePHP startup
            //
            // if this happens, please check the app/config/doctrine.php configuration file
            //
            ->plug(DoctrinePackage::class)
            ->plug(new WebSocketServerPackage());
        ;

    }

}


