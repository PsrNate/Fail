<?php

namespace Fail\StatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EncounterType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('lostRounds')
            ->add('date')
        ;
    }

    public function getName()
    {
        return 'fail_statbundle_encountertype';
    }
}
