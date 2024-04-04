<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Firstname:',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Lastname:',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('age', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Âge:',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('gender', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Gender:',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    '--' => '--',
                    'Mr.' => 'Mr.',
                    'Ms.' => 'Ms.',
                ]
            ])
            ->add('country',  TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Country:',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Créez votre profil !'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
