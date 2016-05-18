<?php

namespace CakeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CakeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('spongeType', null, ['expanded' => true])
            ->add('buttercreams', null, ['expanded' => true])
            ->add('soak', null, ['expanded' => true])
            ->add('frosting', null, ['expanded' => true]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CakeBundle\Entity\Cake',
        ));
    }

}
