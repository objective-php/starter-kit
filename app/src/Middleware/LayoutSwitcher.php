<?php

    namespace Project\Middleware;
    
    
    use ObjectivePHP\Application\ApplicationInterface;
    use ObjectivePHP\Application\Middleware\AbstractMiddleware;

    class LayoutSwitcher extends AbstractMiddleware
    {
        /**
         * @param ApplicationInterface $application
         *
         * @return mixed
         */
        public function run(ApplicationInterface $app)
        {
            $app->setParam('layout.name', 'home');
        }

    }