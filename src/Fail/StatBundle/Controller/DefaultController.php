<?php

namespace Fail\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fail\StatBundle\Entity\Player;


class DefaultController extends Controller
{
    public function adminIndexAction()
    {
        $tpl_path = 'FailStatBundle:Default:admin.html.twig';
        return $this->render($tpl_path);
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $pr = $em->getRepository('FailStatBundle:Player');
        $argts['players'] = $pr->findBy(array(), array('elo' => 'desc'));
        
        foreach($argts['players'] as $p)
        {
            $p->setRank($pr->getRank($p));
            $p->setEx($pr->getEx($p));
        }
        $tpl_path = 'FailStatBundle:Default:index.html.twig';
        return $this->render($tpl_path, $argts);
    }
}
