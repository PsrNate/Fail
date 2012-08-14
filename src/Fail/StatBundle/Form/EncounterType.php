<?php

namespace Fail\StatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

class EncounterType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $player_opt = array(
            'class' => 'FailStatBundle:Player',
            'property' => 'name',
        );
        
        $builder->add('winner', 'entity', $player_opt);
        $builder->add('loser', 'entity', $player_opt);
        $builder->add('lostRounds', 'integer');
        $builder->add('event', 'entity', array(
            'class' => 'FailStatBundle:Event',
        ));
    }

    public function getName()
    {
        return 'fail_statbundle_encountertype';
    }
}
