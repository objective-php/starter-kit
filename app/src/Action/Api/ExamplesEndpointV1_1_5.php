<?php

namespace Project\Action\Api;

use ObjectivePHP\RestAction\AbstractEndpoint;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class ExamplesEndpointV1
 *
 * @package Project\Action\Api
 */
class ExamplesEndpointV1_1_5 extends AbstractEndpoint
{
    public function get(ServerRequestInterface $request)
    {
        return ['This', 'is', __METHOD__, 'return'];
    }
}
