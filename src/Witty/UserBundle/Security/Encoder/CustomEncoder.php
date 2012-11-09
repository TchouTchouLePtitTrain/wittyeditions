<?php

namespace Witty\UserBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;


class CustomEncoder extends BasePasswordEncoder {

	/*
	* Encodage du md5 en sha512 car les mots de passe avant migration sur symfony sont encodés en md5. 
	* On ajoute donc un encodage par-dessus puisqu'on ne dispose pas du mot de passe en clair.
	*
	*/
    public function encodePassword($raw, $salt)
    {
        return crypt(md5($raw), '$2y$07$'.$salt.'$');
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $this->comparePasswords($encoded, $this->encodePassword($raw, $salt));
    }

}