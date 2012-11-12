<?php

namespace Witty\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class OrderController extends Controller
{
    /**
     * @Route("commander", name="order_commander")
     * @Template()
     */
    public function commanderAction()
    {
        return array();
    }
	
    /**
     * @Route("", name="order_confirmationCommande")
     * @Template()
     */
    public function confirmationCommandeAction()
    {
		
		$em = $this->getDoctrine()->getEntityManager();
		$user = $this->container->get('security.context')->getToken()->getUser();
		$request = $this->getRequest();
		$order = new Order();
	
		//Récupération du nombre de commandes
		foreach($request->get('customerOrders') as $id_product => $quantity)
		{
			$product = $em->getRepository('WittyOrderBundle:Product')->find($id_product);
		
			$orderProduct = new OrderProduct();
			$orderProduct->setProduct($product);
			$orderProduct->setQuantity($quantity);
			$orderProduct->setUnitPrice($product->getUnitPrice()); //"Redondance" de l'information unitPrice pour que l'on puisse changer le prix d'un Product sans en créer un nouveau, et tout de même garder l'historique du prix payé par l'utilisateur
			
			$order->add(new OrderProduct());
		}
		
		//Gestion de la promo
		if ($customerPromo = $request->get('promo'))
			if ($promo =$em->getRepository('WittyOrderBundle:Promo')->find($customerPromo))
				$orderProduct->setPromo($promo);
	
		//Persistence de la commande
		$em->persist($order);
		$em->flush();
	
		//Envoi des mails
			//Mail à l'utilisateur
		$message = \Swift_Message::newInstance()
		->setSubject('Confirmation de commande')
		->setFrom($this->container->getParameter('witty.mail.expediteur'))
		->setTo($user->getEmail())
		->setBody('Bonjour et merci de votre commande.<br/><br/>Votre commande a bien été prise en compte.<br/>Vous la recevrez sous 3 jours maximum.<br/><br/>Ludiquement,<br/>La Witty Team<br/><br/>P.S: Ceci est un envoi automatique. Merci de ne pas répondre à cet email, il ne serait pas traité.');
		
		$this->get('mailer')->send($message);
			
			//Mail à la boîte contact
		$message = \Swift_Message::newInstance()
		->setSubject('Commande de '.$user->getLabel().' d\'un montant de '.$order->getTtcAmount())
		->setFrom($this->container->getParameter('witty.mail.expediteur'))
		->setTo($this->container->getParameter('witty.mail.contact'))
		->setBody('Votre commande a bien été prise en compte.<br/>Vous la recevrez sous 3 jours maximum.<br/>Ludiquement,<br/>La Witty Team');
		
		$this->get('mailer')->send($message);
			
			
			//Mail à Atlankit
		$message = \Swift_Message::newInstance()
		->setSubject('Commande de '.$user->getLabel())
		->setFrom($this->container->getParameter('witty.mail.expediteur'))
		->setTo($this->container->getParameter('witty.mail.contact'))
		->setBody('Votre commande a bien été prise en compte.<br/>Vous la recevrez sous 3 jours maximum.<br/>Ludiquement,<br/>La Witty Team');
		
		$this->get('mailer')->send($message);
		

	
        return array();
    }
}
