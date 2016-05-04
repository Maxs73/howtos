<?php

namespace Progetto\Form;

use Zend\InputFilter\InputFilter;

class ProgettoInputFilter extends InputFilter
{

    public function __construct()
    {

        $this->add([
            'name' => 'codice',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);

        $this->add([
            'name' => 'utente',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);

        $this->add([
            'name' => 'titolo',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);


    }

}
