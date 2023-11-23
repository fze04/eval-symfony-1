<?php

namespace App\Form;

use App\Entity\Notes;
use App\Entity\LesMatieres;
use Doctrine\DBAL\Types\DateImmutableType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class NotesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
        
            ->add('Matieres', EntityType::class,[
                'class'=> LesMatieres::class,
                'choice_label' => 'nom',
                
              
                   
            ])
            
            ->add('submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Notes::class,
        ]);
    }
}
