<?php

namespace Witty\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildUserForm($builder, $options);
    }
    
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildUserForm($builder, $options);

        $builder
			->remove('username')
			->remove('plainPassword')  
			->remove('email')            
			->add('avatarFile', 'file', array('required' => false, 'label' => 'Changer mon avatar '))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
			->add('plainPassword', 'password', array( 'required' => false, 'always_empty' => true, 'label' => 'Password')) //Override du champ password tel que défini dans le FOSUserBundle, pour qu'il ne soit plus 'required' et qu'il soit 'always_empty'
            ->add('username', null, array('label' => 'Pseudo', 'translation_domain' => 'FOSUserBundle'))
            ->add('firstname', 'text', array('required' => false, 'label' => 'Prénom'))
            ->add('lastname', 'text', array('required' => false, 'label' => 'Nom'))
            ->add('sex', 'choice', array('required' => false, 'choices' => array( 1 => 'Homme', 0 => 'Femme'), 'expanded' => true, 'multiple' => false, 'label' => 'Sexe'))
            ->add('birthdate', 'birthday', array('required' => false, 'format' => 'dd-MM-yyyy', 'label' => 'Date de naissance'/*, 'years' => array('1920', '1921')*/))
            ->add('address', 'text', array('required' => false, 'label' => 'Adresse'))
            ->add('address_2', 'text', array('required' => false, 'label' => "Complément d'adresse"))
            ->add('postcode', 'text', array('required' => false, 'label' => 'Code postal'))
            ->add('city', 'text', array('required' => false, 'label' => 'Ville'))
            ->add('country', 'country', array('required' => false, 'label' => 'Pays'))
            //->add('country', 'country', array('required' => false))
            ->add('newsletter', 'checkbox', array('value' => 0, 'required' => false, 'label' => 'Recevoir la newsletter'))
        ;
    }

    public function getName()
    {
        return 'witty_user_profile';
    }
}
