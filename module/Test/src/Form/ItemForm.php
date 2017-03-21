<?php

namespace Test\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class ItemForm extends Form {
    public function __construct($name = null) {

        parent::__construct($name);

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Add',
                'id'    => 'submitbutton'
            ],
        ]);

        $inputFilter = new InputFilter();                
        $inputFilter->add([
            'name' => 'name',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],                
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 100
                    ],
                ],
            ],
        ]);
        $this->setInputFilter($inputFilter);
    }
}