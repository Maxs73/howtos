<?php
namespace Progetto\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ProgettoServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');

        $userLogged = $serviceLocator->get('zfcuser_auth_service');

        return new ProgettoService($entityManager, $userLogged);

    }


}
