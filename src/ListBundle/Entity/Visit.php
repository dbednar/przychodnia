<?php

namespace ListBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="ListBundle\Repository\VisitRepository")
 * @ORM\Table("visit")
 */
class Visit {
 
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @ORM\Column(name="visit_date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime()
     */
    
    protected $visitDate;
    
    /**
     * @ORM\ManyToOne(targetEntity="Doctor", inversedBy="visit",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     */
    public $doctor;
    
    /**
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="visit")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     */
    public $patient;
    
    function getId() {
        return $this->id;
    }

    function getVisitDate() {
        return $this->visitDate;
    }

    function getDoctor() {
        return $this->doctor;
    }

    function getPatient() {
        return $this->patient;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setVisitDate($visitDate) {
        $this->visitDate = $visitDate;
    }

    function setDoctor($doctor) {
        $this->doctor = $doctor;
    }

    function setPatient($patient) {
        $this->patient = $patient;
    }


    
}
