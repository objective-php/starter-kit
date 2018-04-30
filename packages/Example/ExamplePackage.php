<?php

namespace Project\Package\Example;

use ObjectivePHP\Application\Package\PackageInterface;
use ObjectivePHP\Application\Workflow\PackagesInitListener;
use ObjectivePHP\Application\Workflow\WorkflowEventInterface;
use ObjectivePHP\Config\Loader\FileLoader\FileLoader;

/**
 * Class ExamplePackage
 *
 * Access /example on your local copy to trigger some content generation from here
 *
 * @package Showcase\Package\Debug
 */
class ExamplePackage implements PackageInterface, PackagesInitListener
{
    public function onPackagesInit(WorkflowEventInterface $event)
    {

        $params = (new FileLoader())->load(__DIR__ . '/config');

        $event->getApplication()->getConfig()->hydrate($params);

    }

}
