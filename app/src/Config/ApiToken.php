<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 09/07/2017
 * Time: 12:18
 */

namespace Config;


use ObjectivePHP\Config\SingleValueDirective;

class ApiToken extends SingleValueDirective
{


    /**
     * ApiToken constructor.
     */
    public function __construct($value)
    {

        if(!is_string($value)) throw new \Exception('niiiiit');

        parent::__construct($value);
    }
}