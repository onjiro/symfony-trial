<?php

namespace Onjiro\Bundle\KakeiboBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/kakeibo")
     * @Route("/kakeibo/index")
     */
    public function indexAction()
    {
        return array('name' => 'index.php');
    }
}
