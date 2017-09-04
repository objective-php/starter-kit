<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 09/07/2017
 * Time: 11:50
 */

namespace Project\Action\Api;


use ObjectivePHP\Application\Action\RestfulAction;
use ObjectivePHP\Application\Action\VersionedApiAction;
use ObjectivePHP\ServicesFactory\ServiceReference;

class Test extends VersionedApiAction
{

    protected $versionParameter = 'v';

    /**
     * Delegated constructor
     *
     * This should be overridden in children instead of overriding __construct()
     */
    public function init()
    {
        $this->registerMiddleware('1.0', TestV1::class);
        $this->registerMiddleware('2.0', TestV2::class);
    }


}
