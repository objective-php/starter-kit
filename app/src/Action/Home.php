<?php

namespace Project\Action;

use ObjectivePHP\PhtmlAction\PhtmlAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class Home
 *
 * @package Showcase\Action
 */
class Home extends PhtmlAction
{
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->render([
            'page.title' => 'Objective PHP Project Template',
            'page.subtitle' => 'This project provides developers with a pre-configured project template. 
            Once installed, you should start working on your own application!',
        ]);
    }
}
