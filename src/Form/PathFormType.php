<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\Path;
use App\Entity\Trailer;
use App\Entity\Truck;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PathFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path', TextType::class, [
                'label' => 'Trajeto',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Paris → Lyon'
                ]
            ])

            ->add('startingDate', DateTimeType::class, [
                'label' => 'Data inicial',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('endDate', DateTimeType::class, [
                'label' => 'Data final',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('dischargePrice', NumberType::class, [
                'label' => 'Preço de descarga (€)',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('waitingPrice', NumberType::class, [
                'label' => 'Preço espera (€)',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('truck', EntityType::class, [
                'class' => Truck::class,
                'choice_label' => 'id',
                'label' => 'Camião',
                'placeholder' => 'Escolher camião',
                'attr' => [
                    'class' => 'form-select'
                ]
            ])

            ->add('driver', EntityType::class, [
                'class' => Driver::class,
                'choice_label' => 'id',
                'label' => 'Motorista',
                'placeholder' => 'Escolher motorista',
                'attr' => [
                    'class' => 'form-select'
                ]
            ])

            ->add('trailer', EntityType::class, [
                'class' => Trailer::class,
                'choice_label' => 'id',
                'label' => 'Reboque',
                'placeholder' => 'Escolher reboque',
                'required' => false,
                'attr' => [
                    'class' => 'form-select'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Path::class,
        ]);
    }
}