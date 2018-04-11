<?php

namespace Project\Action;

use ObjectivePHP\Application\Action\RenderableAction;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Application\View\Helper\Vars;

/**
 * Class Home
 *
 * @package Showcase\Action
 */
class Home extends RenderableAction
{

    public function init()
    {
        // $this->registerParamProcessor('from', new DateProcessor(), true);
        //$this->registerParamProcessor('id', new NumericProcessor(INT_POSITIVE));

    }

    /**
     * @param ApplicationInterface
     *
     * @return array
     */
    public function run(ApplicationInterface $app)
    {


        // Vars class holds view variables
        //
        // you can return an array of view variables or
        // directly call it

        Vars::set('page.title', 'Objective PHP Project Template');
        Vars::set('page.subtitle', 'This project provides developers with a pre-configured project template. Once installed, you should start working on your own application!');
    }
}