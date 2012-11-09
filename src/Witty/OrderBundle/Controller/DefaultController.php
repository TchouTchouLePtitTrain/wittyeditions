<?php

namespace Witty\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("commander", name="order_commander")
     * @Template()
     */
    public function commanderAction()
    {
		$user = $this->container->get('security.context')->getToken()->getUser();
        return array();
    }
	
    /**
     * @Route("", name="order_confirmationCommande")
     * @Template()
     */
    public function confirmationCommandeAction()
    {
        return array();
    }
}
