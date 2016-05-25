<?php

namespace CakeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cake', CakeType::class)
            ->add('portions')
            ->add('numberOfFloors')
            ->add('deliveryDate', DateType::class)
            ->add('phone')
            ->add('email', EmailType::class)
            ->add('order', SubmitType::class)
        ;
    }
}
