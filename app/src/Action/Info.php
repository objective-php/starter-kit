<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 03/10/2018
 * Time: 23:15
 */

namespace Project\Action;


use ObjectivePHP\PhtmlAction\PhtmlAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Info extends PhtmlAction
{
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->render([], false);
    }

}
