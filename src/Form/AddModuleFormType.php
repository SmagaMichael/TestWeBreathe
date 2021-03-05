<?php

namespace App\Form;

use App\Entity\Module;
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
            ->add('number')
            ->add('description')
            ->add('type', ChoiceType::class, [
                'choices' => [
                  //'Affiche' => 'Value',
                    'Montre' => 1,
                    'Chauffage' => 2,
                    'Prise' => 3,
                    'Assistant Vocal' => 4,
                    'Caméra' => 5,
                ],
            ])

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
            ->add('etat_de_marche')

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
