<?php
use ObjectivePHP\Package\Doctrine\Config\EntityManager;

return [
    (new EntityManager('default'))
        ->setDbname('locate')
        ->setDriver('pdo_mysql')
        ->setHost('127.0.0.1')
        ->setUser('root')
        ->setEntitiesLocations(['app/src/Entity'])
];
