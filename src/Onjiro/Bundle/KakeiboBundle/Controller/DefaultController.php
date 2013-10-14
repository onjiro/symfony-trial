<?php

namespace Onjiro\Bundle\KakeiboBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/kakeibo/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return $this->render('OnjiroKakeiboBundle:Default:index.html.twig', array('name' => $name));
    }
}