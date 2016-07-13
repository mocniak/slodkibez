<?php

namespace CakeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CakeAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array(
                'label' => 'Cake name'
            ))
            ->add('spongeType', 'entity', array(
                'label' => 'Spongecake type',
                'class' => 'CakeBundle\Entity\SpongeType'
            ))
            ->add('soak')
            ->add('buttercreams')
            ->add('frosting')
            ->add('official')
            ->add('pricePerPortion', null, ['label' => 'Single portion price']);
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('spongeType')
            ->add('pricePerPortion')
            ->add('official')
            ->add('_action', 'actions', array(
                'actions' => array(
                'edit' => array(),
                'delete' => array(),
                )
            ));
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('pricePerPortion');
    }
}
