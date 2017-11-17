<?php

namespace ListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ListBundle\Entity\Patient;
use Symfony\Component\HttpFoundation\Request;
use ListBundle\Form\Type\PatientType;


/**
 * @Route("/pacjenci")
 */

class PatientsController extends Controller {
    
    
    /**
     * @Route("/",name="patients")
     * @Template
     */
    
     public function indexAction(){
         
        $repository = $this->getDoctrine()->getRepository(Patient::class);
        $patients = $repository->findAll();
        return array(
            'patients' => $patients,
        );
         
     }
     
      /**
     * @Route("/dodaj/{patient_id}",name="add_patient", defaults={"patient_id": 0})
     * @Template
     */
    
    public function addPatientAction($patient_id,Request $request){
        $em = $this->getDoctrine()->getManager();
        $patient=($patient_id==0)?new Patient:$em->getRepository(Patient::class)->find($patient_id) ;
        $form = $this->createForm(PatientType::class,$patient);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            

            $em->persist($patient);


            $em->flush();

            $message = ($patient_id==0)?"Dodano nowego użytkownika" :"Edytowano użytkownika"  ;
            
            return array(
                'message' => $message,
            );
            
        }
        
        return  array(
                'form' => $form->createView(),
             );
        
    }
    
    /**
     * @Route("/usun/{patient_id}",name="remove_patient", defaults={"patient_id": 0})
     * @Template
     */
    
    public function removePatientAction($patient_id){
         $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository(Patient::class)->findOneBy(array('id' => $patient_id));
        $em->remove($patient);
        $em->flush();
     
            $message = "Usunięto pacjęta"  ;
        return array(
                'message' => $message,
       );
 
    }
    
    
}
