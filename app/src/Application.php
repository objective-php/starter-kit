<?php

    namespace Project;

    /**
     * The AppNamesapce namespace should be changed to whatever fit your project
     *
     * Many modern IDEs offer powerful refactoring features that should make this
     * renaming operation painless
     */

    use ObjectivePHP\Application\AbstractApplication;
    use ObjectivePHP\Application\Operation\Common\RequestWrapper;
    use ObjectivePHP\Application\Operation\Common\ResponseInitializer;
    use ObjectivePHP\Application\Operation\Common\ResponseSender;
    use ObjectivePHP\Application\Operation\Common\ServiceLoader;
    use ObjectivePHP\Application\Operation\Common\SimpleRouter;
    use ObjectivePHP\Application\Operation\Common\ViewRenderer;
    use ObjectivePHP\Application\Operation\Rta\ActionPlugger;
    use ObjectivePHP\Application\Operation\Rta\ActionRunner;
    use ObjectivePHP\Application\Operation\Rta\ViewResolver;
    use ObjectivePHP\Application\Session\Session;
    use ObjectivePHP\Application\View\Helper\Vars;
    use ObjectivePHP\Application\Workflow\Filter\UrlFilter;
    use ObjectivePHP\Notification\Info;
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
                 ->plug(new ResponseInitializer())->as('response-initializer')
            ;

            $this->importPackages();

            // route request (this is done after packages have been loaded)
            //
            // NOTE: using asDefault() make this middleware optional - if
            // another one with the same reference has been plugged earlier,
            // this call has no effect on the actual middleware stack
            $this->getStep('route')->plug(SimpleRouter::class)->asDefault('router');


            // load framework native middleware
            $this->getStep('bootstrap')->plug(ServiceLoader::class)->asDefault('service-loader');

            // give access to config everywhere, including views
            //
            // Note: this is used by default layouts
            $this->getStep('bootstrap')->plug(function($app) { Vars::$config = $app->getConfig(); });

            // action runner will catch action return value and inject the in the Vars container
            $this->getStep('route')->plug(ActionPlugger::class)->asDefault('action-plugger');



            // handle view rendering

            $this->getStep('rendering')
                 ->plug(LayoutSwitcher::class, new UrlFilter('/'))
                 ->plug(new ViewResolver())->as('view-resolver')
                 ->plug(new ViewRenderer())->as('view-renderer')
            ;

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

            ;

        }

    }


