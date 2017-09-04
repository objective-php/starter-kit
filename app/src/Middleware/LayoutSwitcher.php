<?php

    namespace Project\Middleware;
    
    
    use ObjectivePHP\Application\ApplicationInterface;
    use ObjectivePHP\Application\Middleware\AbstractMiddleware;
    use ObjectivePHP\Application\Workflow\Filter\UrlFilter;

    class LayoutSwitcher extends AbstractMiddleware
    {
        /**
         * @param ApplicationInterface $application
         *
         * @return mixed
         */
        public function run(ApplicationInterface $app)
        {

            switch(true)
            {

                case (new UrlFilter('/'))->run($app):
                    $layout = 'home';
                    break;

                default:
                    $layout = 'layout';
                    break;
            }



            $app->setParam('layout.name', $layout);
        }

    }