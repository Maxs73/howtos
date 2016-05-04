<?php

namespace Progetto\Form;

use Zend\Form\Form;

class ProgettoForm extends Form
{
    public function __construct()
    {
        parent::__construct('progetto');
        $this->setAttribute('method', 'post');

        $this->add([
            'name'       => 'codice',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Codice',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'codice',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'titolo',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Titolo',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'titolo',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'utente',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Utente',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'utente',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'descrizione',
            'type'       => 'Zend\Form\Element\Textarea',
            'options' => array(
                 'label' => 'Descrizione',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'descrizione',
                'class'    => 'form-control'
            ]
        ]);

}
}
