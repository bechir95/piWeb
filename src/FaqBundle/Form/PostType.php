<?php

namespace FaqBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class,[
            'attr' => [
                'placeholder' => 'title',
                'class'       => 'form-control'
            ]
        ])
            ->add('content',TextareaType::class,[
                'attr' => [
                    'placeholder' => 'content',
                    'class'       => 'form-control'
                ]
            ])
            ->add('keywordId')
            ->add('createdAt')
            ->add('userId')
            ->add('likedId')
            ->add('dislikedId')
            ->add('ajout',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FaqBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'faqbundle_post';
    }


}
