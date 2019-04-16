<?php

namespace ForumBundle\Form;

use ForumBundle\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                ->add('Post',SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary',

                ]
                    ])
                    ->add('category_id', EntityType::class,
                        [
                            'class' => Category::class,
                            'choice_label' => 'name',
                            'attr' => [
                                'class'       => 'form-control'
                            ]

                        ]

                        )
        ;

 /*
                ->add('subcategoryId')
                ->add('visibility');

                ->add('notification')
                ->add('views')

                ->add('user');
 */


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
