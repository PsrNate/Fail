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
            'class' => 'FailStatBundle:Encounter',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('p')
                          ->orderBy('p.name', 'ASC');
            },
            'property' => 'name',
        );
        
        $builder->add('winner', 'entity', $player_opt);
        $builder->add('winner', 'entity', $player_opt);
        $builder->add('lostRounds', 'integer');
        $builder->add('event', 'entity', array(
            'class' => 'FailStatBundle:Event',
            'query_builder' => function(EntityRepository $er) {
                $er->createQueryBuilder('e')
                    ->addOrderBy('e.year', 'ASC')
                    ->addOrderBy('e.month', 'ASC');
            }
        ));
    }

    public function getName()
    {
        return 'fail_statbundle_encountertype';
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'Fail\StatBundle\Entity\Encounter'
        );
    }
}
