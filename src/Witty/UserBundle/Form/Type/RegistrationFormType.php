<?php

namespace Witty\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

		parent::buildForm($builder, $options);

        $builder
			->remove('email')
			->remove('username')
			->remove('plainPassword')
			->add('email', 'email', array(
					'label' => 'form.email', 
					'translation_domain' => 'FOSUserBundle', 
					'attr' => array(
						'placeholder' => 'monmail@mail.com',
						)
					)
				)
			->add('plainPassword', 'password', array(
					'translation_domain' => 'FOSUserBundle', 
					'required' => true, 
					'label' => 'form.password', 
					'attr' => array(
						'placeholder' => 'mon mot de passe',
						)
					)
				)
			->add('username', 'text', array(
					'label' => 'Nom de la boutique', 
					'required' => false, 
					'attr' => array(
						'placeholder' => 'boutique',
						)
					)
				)
        ;
    }

    public function getName()
    {
        return 'witty_user_registration';
    }
}
