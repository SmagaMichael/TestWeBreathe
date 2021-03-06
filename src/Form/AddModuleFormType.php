<?php

namespace App\Form;

use App\Entity\Module;
use App\Entity\ModuleCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddModuleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            // ->add('number')
            ->add('description')

            ->add('Category', EntityType::class, [
                'class' => ModuleCategory::class,
                'choice_label' => 'CategoryName',
            ])
            
            // ->add('Category', null, [
            //          'choice_label' => 'CategoryName',
            //          'expanded' => true
            //      ])


            ->add('temperature', RangeType::class,[
                'attr' => [
                    'min' => 0,
                    'max' => 30,
                    'class' => 'p-0',
                ]
            ])

            ->add('duree_fonctionnement', RangeType::class,[
                'attr' => [
                    'min' => 0,
                    'max' => 24,
                    'class' => 'p-0',
                ]
            ])
            ->add('donnees_envoyees')

            ->add('etat_de_marche', ChoiceType::class, [
                'choices'  => [
                    'Marche' => 1,
                    'Arrêt' => 0,
                    'disfonctionnement' => 2,
                ],
            ])

            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false
            ])
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Module::class,
        ]);
    }
}
