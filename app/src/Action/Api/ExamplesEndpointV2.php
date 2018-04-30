<?php

namespace Project\Action\Api;

use ObjectivePHP\Middleware\Action\RestAction\AbstractEndpoint;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class ExamplesEndpointV2
 *
 * @package Project\Action\Api
 */
class ExamplesEndpointV2 extends AbstractEndpoint
{
    public function get(ServerRequestInterface $request)
    {
        return ['data' => 'plop v2'];
    }
}
