<?php


namespace ListBundle\Form\Type;

use ListBundle\Entity\Visit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisitType extends AbstractType{
    
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('doctor',EntityType::class,array(
                    "required"   => true,
                    'class' => 'ListBundle:Doctor',
                    "label" => "Lekarz",
                    'choice_label' => 'fullname',
                    "attr" => array(
                        'class' => 'form-control'
                    ),
                'placeholder' => 'Wybierz lekarza',
                )
            )
            ->add('patient', EntityType::class, array(
                    'required'   => true,
                    'class' => 'ListBundle:Patient',
                    "label" => "Pacjent",
                    "attr" => array(
                        'class' => 'form-control'
                    ),
                 'choice_label' => 'fullname',
                    'placeholder' => 'Wybierz pacjenta',
                )
            )
            ->add('visitDate',DateTimeType::class,array(
                    'required'   => true,
                    "label" => "Data urodzenia",
                    'format' => 'yyyy-m-dd',
           
                )
            )
           
            ->add('save', SubmitType::class,array(
                "label" => "Dodaj",
                'attr'=> array(
                    'class'=> 'btn btn-success'
                )
            ))
        ;
    }
    
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Visit::class,
        ));
    }  
    
    
    
}
