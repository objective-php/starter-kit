<?php

namespace Project\Action\Api;

use ObjectivePHP\Middleware\Action\RestAction\AbstractEndpoint;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class ExamplesEndpointV1
 *
 * @package Project\Action\Api
 */
class ExamplesEndpointV1 extends AbstractEndpoint
{
    public function get(ServerRequestInterface $request)
    {
        return ['This', 'is', __METHOD__, 'return'];
    }
}
