<?php

namespace ListBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class PeselValidator extends ConstraintValidator {
   
    
     public function validate($value, Constraint $constraint)
    {
        if (!preg_match('/^[0-9]{11}$/',  $value )) {
            var_dump('jestem tu');
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
            return;
        }
        
//        if ($this->checkControlNumber(intval($value))) {
//          
//          $this->context->buildViolation($constraint->message)
//                ->setParameter('%string%', $value)
//                ->addViolation();
//            return;
//            
//        }
       
    }
    
    
    final function checkControlNumber($numberPesel){
        $weightPesel = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); 
	$controlSum = 0;
	for ($i = 0; $i < 10; $i++)
	{
		$controlSum += $weightPesel[$i] * $numberPesel[$i]; 
	}
	$controlNumber = 10 - $controlSum % 10; 
	$controlNr = ($controlNumber == 10)?0:$controlNumber;
	if ($controlNr == $numberPesel[10]) 
	{
		return true;
	}
	return false;
        
    }
    
}
