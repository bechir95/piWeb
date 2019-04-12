<?php

namespace ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class,[
            'attr' => [
                'placeholder' => 'content',
                'class'       => 'form-control'
            ]
        ])
                ->add('content',TextareaType::class,[
                    'attr' => [
                        'placeholder' => 'content',
                        'class'       => 'form-control'
                        ]
                    ])
                ->add('categoryId')
                ->add('subcategoryId')
                ->add('visibility')
                ->add('notification')
                ->add('views')
                ->add('createdAt')
                ->add('user');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ForumBundle\Entity\Forum'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'forumbundle_forum';
    }


}
