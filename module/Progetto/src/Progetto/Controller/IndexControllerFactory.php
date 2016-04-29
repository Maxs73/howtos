<?php
namespace Progetto\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $progettoService = $serviceLocator->getServiceLocator()->get('Progetto\Service\ProgettoService');
        $progettoForm = $serviceLocator->getServiceLocator()->get('Progetto\Form\ProgettoForm');

        return new IndexController($progettoService, $progettoForm);

    }


}
