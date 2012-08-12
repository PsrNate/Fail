<?php

namespace Fail\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function adminIndexAction()
    {
        $tpl_path = 'FailStatBundle:Default:admin.html.twig';
        return $this->render($tpl_path);
    }
    
    public function indexAction()
    {
        return $this->render('FailStatBundle:Default:index.html.twig');
    }
}
