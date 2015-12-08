<?php

    use ObjectivePHP\Matcher\Matcher;
    use ObjectivePHP\Primitives\Merger\MergePolicy;
    use Project\Package\Overrider\OverriderPackage;
    use ObjectivePHP\DoctrinePackage\DoctrinePackage;
    use Project\Package\Debug\DebugPackage;
    use Project\Package\ShowSource\ShowSourcePackage;

    return [
            'app.name'            => 'Project Template',
            'actions.namespaces'  =>
                [
                    'Project\\Action'
                ],


            // layouts
            'layouts.locations' =>
                [
                    'app/layouts'
                ],


            // Doctrine related configuration
            // 'doctrine.em.default.entities.locations' => 'app/src/Entity',


            // Example service declaration inject a matcher
            //
            // call $servicesFactory->get('matcher') to build an instance of Matcher
            'services' =>
            [
                [
                    'id' => 'matcher',
                    'class' => Matcher::class
                ]
            ]
    ];