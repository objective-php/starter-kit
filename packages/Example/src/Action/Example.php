<?php

    namespace Project\Package\Example\Action;


    use ObjectivePHP\Application\Action\DefaultAction;
    use ObjectivePHP\Application\ApplicationInterface;

    class Example extends DefaultAction
    {
        function run(ApplicationInterface $app)
        {
            return ['action.var' => uniqid()];
        }

    }