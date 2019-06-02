<?php


namespace Project;


use ObjectivePHP\Application\AbstractEngine;
use ObjectivePHP\DevTools\DevToolsPackage;
use ObjectivePHP\PhtmlAction\PhtmlActionPackage;
use ObjectivePHP\Router\RouterPackage;
use Project\Injector\UtilsInjector;
use Project\Package\Example\ExamplePackage;

class Engine extends AbstractEngine
{
    public function init()
    {
        // register debugging tools
        $this->registerPackage(new DevtoolsPackage($this));

        // register Phtml action package
        $this->registerPackage(new PhtmlActionPackage());

        // register default router package
        $this->registerPackage(new RouterPackage());

        // register local example package
        $this->registerPackage(new ExamplePackage());

        // register dependency injector
        $this->getServicesFactory()->registerInjector(new UtilsInjector());
    }

}
