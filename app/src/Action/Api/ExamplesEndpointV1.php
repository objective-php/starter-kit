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
    protected $models = [
        1 => ['id' => 1, 'name' => 'Gauthier', 'email' => 'gde@opcoding.eu'],
        2 => ['id' => 2, 'name' => 'Arnaud', 'email' => 'apa@opcoding.eu']
    ];

    public function get(ServerRequestInterface $request)
    {
        $id = $request->getQueryParams()['id'] ?? array_rand($this->models);

        return $this->models[$id];
    }
}
