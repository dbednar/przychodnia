<?php
namespace ListBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ListBundle\Validator\Constraints as ListAssert;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table("patient")
 */

class Patient extends AbstractUser {
    
    
   
    
    /**
     * @ORM\Column(name="pesel", type="string")
     * @ListAssert\Pesel
     */
    
    private $pesel;
    
    
    /**
     * @ORM\Column(name="city", type="string")
     * @Assert\NotBlank()
     */
    
    private $city;
    
    /**
     * @ORM\Column(name="post_code", type="string")
     * @Assert\NotBlank()
     */
    
    private $postCode;
    
    /**
     * @ORM\Column(name="addres", type="string")
     * @Assert\NotBlank()
     */
    
     private $addres;
     
     /**
     * @ORM\OneToMany(targetEntity="Visit", mappedBy="patient",cascade={"persist", "remove"})
     */
    
    private $visit;
     
    
    public function __construct() {
        $this->visit = new ArrayCollection();
    }
     
     function getPesel() {
         return $this->pesel;
     }

     function getCity() {
         return $this->city;
     }

     function getPostCode() {
         return $this->postCode;
     }

     function getAddres() {
         return $this->addres;
     }

     function setPesel($pesel) {
         $this->pesel = $pesel;
     }

     function setCity($city) {
         $this->city = $city;
     }

     function setPostCode($postCode) {
         $this->postCode = $postCode;
     }

     function setAddres($addres) {
         $this->addres = $addres;
     }


}
