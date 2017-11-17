<?php

namespace ListBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ListBundle\Entity\Visit;
use ListBundle\Form\Type\VisitType;
/**
 * @Route("/wizyty")
 */


class VisitController extends Controller {
  
    
    /**
     * @Route("/",name="visit")
     * @Template
     */
    
     public function indexAction(){
         
         $repository = $this->getDoctrine()->getRepository(Visit::class);
        $visits = $repository->getAllDataWithVisit();
        return array(
            'visits' => $visits,
        );
         
     }
     
     
      /**
     * @Route("/dodaj/{visit_id}",name="add_visit", defaults={"visit_id": 0})
     * @Template
     */
    
    public function addVisitAction($visit_id,Request $request){
        $em = $this->getDoctrine()->getManager();
        $visit=($visit_id==0)?new Visit:$em->getRepository(Visit::class)->find($visit_id) ;
        $form = $this->createForm(VisitType::class,$visit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            

            $em->persist($visit);


            $em->flush();

            $message = ($visit_id==0)?"Dodano nowa wizytę" :"Edytowano wizytę"  ;
            
            return array(
                'message' => $message,
            );
            
        }
        
        return  array(
                'form' => $form->createView(),
             );
        
    }
    
    /**
     * @Route("/usun/{visit_id}",name="remove_visit", defaults={"visit_id": 0})
     * @Template
     */
    
    public function removeVisitAction($visit_id){
         $em = $this->getDoctrine()->getManager();
        $visit = $em->getRepository(Visit::class)->findOneBy(array('id' => $visit_id));
        $em->remove($visit);
        $em->flush();
     
            $message = "Usunięto wizytę"  ;
        return array(
                'message' => $message,
       );
 
    }
}
