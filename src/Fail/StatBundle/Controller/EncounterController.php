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
    public function newAction()
    {
        $encounter = new Encounter;
        $form = $this->createForm(new EncounterType, $encounter);
        $argts['form'] = $form->createView();
        
        $tpl_path = 'FailStatBundle:Encounter:new.html.twig';
        return $this->render($tpl_path, $argts);
    }
    
    public function createAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $encounter = new Encounter;
        $form = $this->createForm(new EncounterType, $encounter);
        $request = $this->getRequest();
        $form->bindRequest($request);
        $argts['form'] = $form->createView();
        
        if ($form->isValid()) {
            // Elo snapshot
            $w = $encounter->getWinner();
            $l = $encounter->getLoser();
            $encounter->setWinnerElo($w->getElo());
            $encounter->setLoserElo($w->getElo());
            $em->persist($encounter);
            $w->updateElo(4, $l->getElo(), $encounter->getLostRounds());
            $l->updateElo($encounter->getLostRounds(), $w->getElo(), 4);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_index'));
            
        }
        
        $tpl_path = 'FailStatBundle:Encounter:new.html.twig';
        return $this->render($tpl_path, $argts);
    }
}
