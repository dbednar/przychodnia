<?php

namespace ListBundle\Form\Type;

use ListBundle\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class PatientType extends AbstractType {
   
    
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,array(
                    "required"   => true,
                    "label" => "Imię",
                    "attr" => array(
                        'placeholder' => "Podaj Imię",
                        'class' => 'form-control'
                    ),
                )
            )
            ->add('surname', TextType::class, array(
                    'required'   => true,
                    "label" => "Nazwisko",
                    "attr" => array(
                        'placeholder' => "Podaj Nazwisko",
                        'class' => 'form-control'
                    ),
                )
            )
            ->add('birthday',DateType::class,array(
                    'required'   => true,
                    "label" => "Data urodzenia",
                    'format' => 'yyyy-MM-dd',
                   
                )
            )
            ->add('phone', NumberType::class, array(
                    'required'   => true,
                    "label" => "Numer telefonu",
                    "attr" => array(
                        'placeholder' => "Podaj numer telefonu",
                        'class' => 'form-control'
                    ),
                ) 
            )
            ->add('mail',EmailType::class, array(
                    'required'   => true,
                    "label" => "E-amil",
                    "attr" => array(
                        'placeholder' => "Podaj e-mail",
                        'class' => 'form-control'
                    ),
                ) )    
             ->add('pesel',TextType::class, array(
                    'required'   => true,
                    "label" => "Pesel",
                    "attr" => array(
                        'placeholder' => "Podaj numer pesel",
                        'class' => 'form-control'
                    ),
                ) ) 
                ->add('city',TextType::class, array(
                    'required'   => true,
                    "label" => "Miasto",
                    "attr" => array(
                        'placeholder' => "Podaj nazwę miasta",
                        'class' => 'form-control'
                    ),
                ) ) 
                ->add('postCode',TextType::class, array(
                    'required'   => true,
                    "label" => "Kod pocztowy",
                    "attr" => array(
                        'placeholder' => "Podaj kod pocztowy",
                        'class' => 'form-control'
                    ),
                ) )
                 ->add('addres',TextType::class, array(
                    'required'   => true,
                    "label" => "Address",
                    "attr" => array(
                        'placeholder' => "Podaj adress",
                        'class' => 'form-control'
                    ),
                ) ) 
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
            'data_class' => Patient::class,
        ));
    }  
    
    
    
    
}
