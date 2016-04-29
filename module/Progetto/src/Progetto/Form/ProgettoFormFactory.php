<?php

namespace Progetto\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProgettoFormFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return DriverLicenseForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $progettoService = $serviceLocator->get('ProgettoService\ProgettoService');
        //$listaCategorie = $progettoService->getArrayCategorie();

        $inputFilter = new ProgettoInputFilter();//rimanda ai filter
        $form = new ProgettoForm();//carica in un array la lista delle categorie nella combo

        $form->setInputFilter($inputFilter);//applica i filter alla form

        return $form;
    }
}
