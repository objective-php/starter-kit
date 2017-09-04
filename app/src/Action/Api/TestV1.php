<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 09/07/2017
 * Time: 11:50
 */

namespace Project\Action\Api;


use ObjectivePHP\Application\Action\RestfulAction;
use ObjectivePHP\Html\Exception;

class TestV1 extends RestfulAction {

    protected $models = [
        1 => ['id' => 1, 'name' => 'Gauthier', 'email' => 'gde@opcoding.eu'],
        2 => ['id' => 2, 'name' => 'Arnaud', 'email' => 'apa@opcoding.eu']
    ];

    /**
     * @return array|string
     * @throws Exception
     */
    public function get()
    {

        $this->getApplication()->setResponse($this->getApplication()->getResponse()->withHeader('Access-Control-Allow-Origin', '*'));
        header('Access-Control-Allow-Origin:*');

        $this->alias(0, 'id');

        $id = $this->getParam('id', array_rand($this->models));

        return $this->models[$id];

    }


    public function __post()
    {
        return ['data' => uniqid()];
    }


}
