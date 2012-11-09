<?php

namespace Witty\WeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function commanderAction()
    {
		$user = $this->container->get('security.context')->getToken()->getUser();
		//var_dump($user);die('ok');
        return array('name' => 'test');
    }
}
