<?php

namespace Witty\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class ProfileController extends BaseController
{
    /**
     * Edit the user
     */
    public function editAction()
    {
	
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.profile.form');
        $formHandler = $this->container->get('fos_user.profile.form.handler');

        $process = $formHandler->process($user);

        //Gestion de l'avatar
        $avatarFile = $form->getData()->getAvatarFile();
		
		if (isset($avatarFile))
		{
			//Sauvegarde de l'avatar
			$fileSystem = $this->container->get('witty.fs'); //GaufretteBundle - virer les méthodes de user les persist
			$fileSystem->moveFile($avatarFile, 'user/'.$user->getId().'/avatar', $avatarFile->getClientOriginalName());
		}
        
        if ($process) {
            $this->setFlash('fos_user_success', 'profile.flash.updated');

            return new RedirectResponse($this->getRedirectionUrl($user));
        }

        return $this->container->get('templating')->renderResponse(
            'FOSUserBundle:Profile:edit.html.'.$this->container->getParameter('fos_user.template.engine'),
            array(
				'form' => $form->createView(), 
				'user' => $user
			)
        );
    }
	
    /**
     * Voir les rewards du user
     */
    public function displayRewardsAction()
    {
		$userRewards = $this->container->get('doctrine')->getRepository('WittyProjectBundle:UserReward')->findAllByUserIdOrderedByProjectIds($this->container->get('security.context')->getToken()->getUser()->getId());
	
        return $this->container->get('templating')->renderResponse(
            'FOSUserBundle:Profile:display_userrewards.html.'.$this->container->getParameter('fos_user.template.engine'),
            array(
				'userRewards' => $userRewards
			)
        );
    }
	
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('fos_user_profile_edit');
    }
	
	//Renvoie l'avatar de l'utilisateur dont l'id est passé en paramètre.
	// Si aucun id n'est passé, l'avatar de l'user courant est renvoyé
	public function avatarAction($id = null)
	{
		if ($id) $user = $this->container->get('doctrine')->getRepository('WittyUserBundle:User')->find($id);
		else $user = $this->container->get('security.context')->getToken()->getUser();
	
		return $this->container->get('templating')->renderResponse('WittyUserBundle:Profile:avatar.html.twig', array('user' => $user));
	}
}
