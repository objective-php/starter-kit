<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 09/07/2017
 * Time: 11:50
 */

namespace Project\Action\Api;


use ObjectivePHP\Application\Action\RestfulAction;

class TestV2 extends RestfulAction
{


    public function get()
    {
        return ['data' => 'plop v2'];
    }





}