<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 03/10/2018
 * Time: 23:40
 */

namespace Project\Injector;


use ObjectivePHP\ServicesFactory\Injector\InjectorInterface;
use ObjectivePHP\ServicesFactory\ServicesFactory;
use ObjectivePHP\ServicesFactory\Specification\ServiceSpecificationInterface;
use Project\Utils\ExampleHelperAwareInterface;

class UtilsInjector implements InjectorInterface
{
    /**
     * Inject dependencies
     *
     * @param object $instance
     * @param ServicesFactory $servicesFactory
     * @param ServiceSpecificationInterface|null $serviceSpecification
     * @throws \ObjectivePHP\ServicesFactory\Exception\ServicesFactoryException
     */
    public function injectDependencies(
        $instance,
        ServicesFactory $servicesFactory,
        ServiceSpecificationInterface $serviceSpecification = null
    ) {
        if ($instance instanceof ExampleHelperAwareInterface) {
            $instance->setExampleHelper($servicesFactory->get('utils.example-helper'));
        }
    }

}