<?php

namespace Project\Action\Api;

use ObjectivePHP\RestAction\AbstractRestAction;
use ObjectivePHP\RestAction\Serializer\JsonSerializer;

/**
 * Class Entity
 *
 * @package Project\Action\Api
 */
class Example extends AbstractRestAction
{
    public function __construct()
    {
        // Add application/json serializer
        $this->registerSerializer('application/json', new JsonSerializer());

        // Register versioned endpoints
        $this->registerEndpoint('1.0.0', ExamplesEndpointV1::class);
        $this->registerEndpoint('1.1.5', ExamplesEndpointV1_1_5::class);
        $this->registerEndpoint('2.0.0', ExamplesEndpointV2::class);
    }
}
