<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }
    public function layoutAction()
    {
        return $this->render('@Front/layout.html.twig');
    }
}
