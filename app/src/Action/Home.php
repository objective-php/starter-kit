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
    }
}