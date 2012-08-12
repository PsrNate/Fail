<?php

namespace Fail\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fail\StatBundle\Entity\Event;
use Fail\StatBundle\Form\EventType;
use Fail\StatBundle\Entity\Encounter;
use Fail\StatBundle\Form\EncounterType;
/**
 * Event controller.
 *
 */
class EncounterController extends Controller
{
    public function newEncounterAction()
    {
        $encounter = new Encounter;
        $form = $this->createForm(new EncounterType, $encounter);
        $argts['form'] = $form->createView();
        
        $tpl_path = 'FailStatBundle:Encounter:new.html.twig';
        return $this->render($tpl_path, $argts);
    }
}
