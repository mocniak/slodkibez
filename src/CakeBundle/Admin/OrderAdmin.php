<?php

namespace CakeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class OrderAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cake.name', 'text', array(
                'label' => 'Cake name',
                'read_only' => true,
                'disabled' => true,
            ))
            ->add('cake.spongeType', 'entity', array(
                'label' => 'Spongecake type',
                'class' => 'CakeBundle\Entity\SpongeType',
                'read_only' => true,
                'disabled' => true,
            ))
            ->add('cake.soak', null, [
                'read_only' => true,
                'disabled' => true
            ])
            ->add('cake.buttercreams', 'sonata_type_model', [
                'multiple' => true,
                'read_only' => true,
                'disabled' => true,
            ])
            ->add('cake.frosting', null, [
                'read_only' => true,
                'disabled' => true
            ])
            ->add('portions')
            ->add('numberOfFloors')
            ->add('orderDate', 'sonata_type_datetime_picker', ['format' => 'y-MM-d'])
            ->add('deliveryDate', 'sonata_type_datetime_picker', ['format' => 'y-MM-d'])
            ->add('phone')
            ->add('email')
            ->add('notes');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('phone')
            ->add('orderDate')
            ->add('deliveryDate');
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'deliveryDate',
    );

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('orderDate', null, ['format' => 'Y-m-d'])
            ->add('deliveryDate', null, ['format' => 'Y-m-d'])
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
