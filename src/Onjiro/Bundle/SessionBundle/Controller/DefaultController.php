<?php

namespace Onjiro\Bundle\SessionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OnjiroSessionBundle:Default:index.html.twig', array('name' => $name));
    }
}
