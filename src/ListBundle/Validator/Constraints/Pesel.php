<?php

namespace ListBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Pesel  extends Constraint{
    
    public $message = "Podany numer pesel jest nie poprawny";
    
     public function validatedBy()
    {
        return get_class($this).'Validator';
    }
    
    
}
