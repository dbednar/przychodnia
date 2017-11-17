<?php

namespace ListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass
 */
class AbstractUser {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="names", type="string", length=50)
     * @Assert\NotBlank()
     */
    public $name;
    
    /**
     * @ORM\Column(name="surname",type="string", length=50)
     * @Assert\NotBlank()
     */
    
    public $surname;
    
    /**
     * @ORM\Column(name="birthday",type="date")
     * @Assert\NotBlank() 
     * @Assert\Date()
     */
    
    public $birthday;
    
    /**
     * @ORM\Column(name="phone", type="integer")
     * @Assert\NotBlank()
     */

    public $phone;
    
    
    /**
     * @ORM\Column(name="mail", type="string")
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "Podaj poprawny email",
     * )
     */
    protected $mail;
    
    
    public $fullName;
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getPhone() {
        return $this->phone;
    }

    function getMail() {
        return $this->mail;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function getFullName(){
        return $this->surname . ' '. $this->name;
    }
    
    
}

