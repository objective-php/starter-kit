<?php
use ObjectivePHP\Package\Doctrine\Config\EntityManager;

return [
    (new EntityManager('default'))
        ->setDbname('project')
        ->setDriver('pdo_mysql')
        ->setHost('localhost')
        ->setUser('root')
        ->setEntitiesLocations(['app/src/Entity'])
];