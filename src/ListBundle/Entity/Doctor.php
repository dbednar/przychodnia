<?php


namespace ListBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table("doctor")
 */

class Doctor extends AbstractUser{
   
    
    /**
     * @ORM\OneToMany(targetEntity="Visit", mappedBy="doctor",cascade={"persist", "remove"})
     */
    
    private $visit;
    
    
    public function __construct() {
        $this->visit = new ArrayCollection();
    }
    
    
    
}
