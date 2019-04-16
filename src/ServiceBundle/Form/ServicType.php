<?php

namespace ServiceBundle\Form;


use ServiceBundle\Entity\Gardener;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('libelle',TextType::class,[
                    'attr' => [
                        'placeholder' => 'libelle',
                        'class'       => 'form-control'
                        ]
                    ])
                ->add('description',TextType::class,[
                    'attr' => [
                        'placeholder' => 'description',
                        'class'       => 'form-control'
                        ]
                    ])
                ->add('prix',TextType::class,[
                    'attr' => [
                        'placeholder' => 'prix',
                        'class'       => 'form-control'
                    ]
                ])

                ->add('Continue',SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary',

                ]
            ])
                ->add('gardener',EntityType::class,
                    [
                        'class' => Gardener::class,
                        'choice_label' => 'name',
                        'attr' => [
                            'class'       => 'form-control'
                        ]

                    ]
                    )
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ServiceBundle\Entity\Servic'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'servicebundle_servic';
    }


}
