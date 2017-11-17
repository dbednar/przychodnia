<?php


namespace ListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ListBundle\Entity\Doctor;
use ListBundle\Form\Type\DoctorType;
/**
 * @Route("/lekarze")
 */

class DoctorController extends Controller {
    
    
    /**
     * @Route("",name="doctor")
     * @Template
     */
    
    
    public function indexAction(){
        
        $repository = $this->getDoctrine()->getRepository("ListBundle:Doctor");
        $doctors = $repository->findAll();
        return array(
            'doctors' => $doctors,
        );
    }
    
    /**
     * @Route("/dodaj/{doctor_id}",name="add_doctor", defaults={"doctor_id": 0})
     * @Template
     */
    
    public function addDoctorAction($doctor_id,Request $request){
        $em = $this->getDoctrine()->getManager();
        $doctor = ($doctor_id==0)?new Doctor:$em->getRepository(Doctor::class)->find($doctor_id) ;
        $form = $this->createForm(DoctorType::class,$doctor);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            

            $em->persist($doctor);


            $em->flush();

            $message = ($doctor_id==0)?"Dodano nowego użytkownika" :"Edytowano użytkownika"  ;
            return array(
                'message' => $message,
            );
        }
        
        return  array(
                'form' => $form->createView(),
             );
        
    }
    
    
    /**
     * @Route("/usun/{doctor_id}",name="remove_doctor", defaults={"doctor_id": 0})
     * @Template
     */
    
    public function removeDoctorAction($doctor_id){
         $em = $this->getDoctrine()->getManager();
        $doctor = $em->getRepository(Doctor::class)->findOneBy(array('id' => $doctor_id));
        $em->remove($doctor);
        $em->flush();
     
            $message = "Usunięto użytkownika"  ;
        return array(
                'message' => $message,
       );
 
    }
    
}
