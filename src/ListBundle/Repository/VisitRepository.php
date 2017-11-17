<?php

namespace ListBundle\Repository;

use Doctrine\ORM\EntityRepository;

class VisitRepository extends EntityRepository{
   

    
    public function getAllDataWithVisit(){
        return $this->_em->createQueryBuilder()
                        ->select("p","v","d")
                        ->from('ListBundle:Visit', 'v')
                        ->innerJoin("v.doctor","d")
                        ->innerJoin('v.patient','p')
                        ->getQuery()->getResult();
      
    }
    
    
    
    
    
}
