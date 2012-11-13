<?php

namespace Witty\WeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("", name="we_accueil")
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('order_commander'));
    }
	
    /**
     * @Route("cgv", name="we_cgv")
	 * @Template()
     */
    public function cgvAction()
    {
        return array();
    }
}
