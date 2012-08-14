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
        
        if ($form->isValid()) {
            // Elo snapshot
            $we = $encounter->getWinner()->getElo();
            $le = $encounter->getLoser()->getElo();
            $em->persist($encounter);
            
            $em->flush();

            return $this->redirect($this->generateUrl('admin_index'));
            
        }

        return $this->render('FailStatBundle:Event:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }
}
