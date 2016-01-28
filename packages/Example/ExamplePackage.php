<?php
    
    namespace Project\Package\Example;

    use ObjectivePHP\Application\ApplicationInterface;
    use ObjectivePHP\Config\Loader\DirectoryLoader;
    use Project\Application;

    /**
     * Class ExamplePackage
     *
     * Access /example on your local copy to trigger some content generation from here
     *
     * @package Showcase\Package\Debug
     */
    class ExamplePackage
    {

        /**
         * @param Application $app
         *
         * @throws \ObjectivePHP\Config\Exception
         */
        public function __invoke(ApplicationInterface $app)
        {

            // setup autoloading for current package
            //
            // note that a relative path is relative to the application root directory!
            $app->getAutoloader()->addPsr4('Project\\Package\\Example\\', 'packages/Example/src');


            // init package here
            $configLoader = new DirectoryLoader();
            $configLoader->loadInto($app->getConfig(), __DIR__ . '/config');

        }


    }