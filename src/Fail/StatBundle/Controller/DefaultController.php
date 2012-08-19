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
    
    public function reportAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $pr = $em->getRepository('FailStatBundle:Player');
        $players = $pr->findBy(array(), array('elo' => 'desc'));
        foreach($players as $p)
        {
            $p->setRank($pr->getRank($p));
            $p->setEx($pr->getEx($p));
        }
        
        $argts['entry'] = '[table][tr]';
        $argts['entry'] .= '[th]Rang[/th]';
        $argts['entry'] .= '[th]Nom[/th]';
        $argts['entry'] .= '[th]Elo[/th]';
        $argts['entry'] .= '[th]Matches[/th][/tr]';
        
        foreach($players as $p)
        {
            $argts['entry'] .= '[tr]';
            $argts['entry'] .= '[td]'.$p->getRank();
            $argts['entry'] .= $p->getRank() == 1 ? '[sup]er[/sup]' : '[sup]e[/sup]';
            $argts['entry'] .= $p->getEx() ? ' ex[/td]' : '[/td]';
            $argts['entry'] .= '[td]'.$p->getName().'[/td]';
            $argts['entry'] .= '[td]'.$p->getElo().'[/td]';
            $argts['entry'] .= '[td]'.$p->getMatchesCount().'[/td][/tr]';
        }
        
        $argts['entry'] .= '[/table]';
        
        $tpl_path = 'FailStatBundle:Default:report.html.twig';
        return $this->render($tpl_path, $argts);
    }
}
