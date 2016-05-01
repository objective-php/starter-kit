<?php

    namespace Project\Package\Example\Action;


    use ObjectivePHP\Application\Action\DefaultAction;
    use ObjectivePHP\Application\Action\RenderableAction;
    use ObjectivePHP\Application\ApplicationInterface;

    class Example extends RenderableAction
    {
        function run(ApplicationInterface $app)
        {
            return ['action.var' => uniqid()];
        }

    }