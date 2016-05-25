<?php

namespace CakeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('deliveryDate',
                DateType::class,
                [
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'attr' => [
                        'class' => 'datepicker',
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'dd-mm-yyyy',
                    ]
                ]
            )
            ->add('notes', TextareaType::class, ['required' => false])
            ->add('phone')
            ->add('email', EmailType::class)
            ->add('order', SubmitType::class)
        ;
    }
}
