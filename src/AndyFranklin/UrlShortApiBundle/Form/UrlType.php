<?php

namespace AndyFranklin\UrlShortApiBundle\Form;

use AndyFranklin\UrlShortApiBundle\Entity\Url;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class UrlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('originalUrl', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Url::class,
            'csrf_protection' => false,
        ]);
    }

}
