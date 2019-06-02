<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 03/10/2018
 * Time: 23:43
 */

namespace Project\Action;


use ObjectivePHP\PhtmlAction\PhtmlAction;
use Project\Utils\ExampleHelper;
use Project\Utils\ExampleHelperAwareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DependencyInjection extends PhtmlAction implements ExampleHelperAwareInterface
{
    /**
     * @var ExampleHelper
     */
    protected $helper;

    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->render(['helper' => $this->helper]);
    }

    /**
     * @return ExampleHelper
     */
    public function getExampleHelper(): ExampleHelper
    {
        return $this->helper;
    }

    /**
     * @param ExampleHelper $helper
     */
    public function setExampleHelper(ExampleHelper $helper)
    {
        $this->helper = $helper;
    }


}
