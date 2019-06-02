<?php

namespace Project\Package\Example\Action;


use ObjectivePHP\PhtmlAction\PhtmlAction;
use Project\HttpApplication;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class Example
 * @package Project\Package\Example\Action
 */
class Example extends PhtmlAction
{
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     * @param ServerRequestInterface $request
     * @param HttpApplication $handler
     * @return ResponseInterface
     * @throws \ObjectivePHP\PhtmlAction\Exception\PhtmlTemplateNotFoundException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->render(['action.var' => uniqid(), 'from.config' => $handler->getConfig()->get('example.param')]);
    }

}
