<?php

namespace Witty\BarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BarController extends Controller
{
    /**
     * @Template()
     */
    public function displayAction()
    {
        return $this->render('WittyBarBundle:Bar:index.html.twig', array());
    }
}
