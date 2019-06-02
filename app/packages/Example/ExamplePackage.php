<?php

namespace Project\Package\Example;

use ObjectivePHP\Application\Package\AbstractPackage;
use ObjectivePHP\Config\Directive\AbstractScalarDirective;

/**
 * Class ExamplePackage
 *
 * Access /example on your local copy to trigger some content generation from here
 *
 * @package Showcase\Package\Debug
 */
class ExamplePackage extends AbstractPackage
{
    public function getDirectives(): array
    {
        return [
            new class extends AbstractScalarDirective
            {
                const KEY = 'example.param';
            }
        ];
    }

}
