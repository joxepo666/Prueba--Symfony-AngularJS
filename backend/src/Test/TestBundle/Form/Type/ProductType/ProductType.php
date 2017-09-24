<?php
// test_1/backend/src/Test/TestBundle/Form/Type/ProductType/ProductType.php

namespace Test\TestBundle\Form\Type\ProductType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('SKU')
            ->add('name')
            ->add('price')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'data_class' => 'Test\TestBundle\Entity\Producto',
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "";
    }


}