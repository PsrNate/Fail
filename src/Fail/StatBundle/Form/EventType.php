<?php

namespace Fail\StatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EventType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('month')
            ->add('year')
        ;
    }

    public function getName()
    {
        return 'fail_statbundle_eventtype';
    }
}
