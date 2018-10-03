<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 03/10/2018
 * Time: 23:42
 */

namespace Project\Utils;


interface ExampleHelperAwareInterface
{
    public function setExampleHelper(ExampleHelper $helper);
}