<?php

namespace Onjiro\Bundle\KakeiboBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Onjiro\Bundle\KakeiboBundle\Database\DatabaseConnectorBase;

class DefaultController extends Controller
{
    /**
     * @Route("/kakeibo")
     * @Route("/kakeibo/index")
     */
    public function indexAction()
    {
        $requestContainer = $this->get('request_context');
        /* $connector = $this->get('database.hoge'); */
        /* $connector->find(); */
        return array('name' => 'index.php');
    }
}
