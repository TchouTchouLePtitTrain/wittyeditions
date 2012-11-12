<?php

namespace Witty\ToolsBundle\Service\Twig\Extension;


class EntityManager extends \Twig_Extension
{	

	public function getName()
    {
        return 'EntityManager';
    }

    public function getFunctions()
    {
        return array(
            'first' => new \Twig_Function_Method($this, 'first') 
        );
    }


    /**
     * Renvoie le premier élément d'une collection
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $collection
     */
    public function first(Array $array)
    {
        return ((isset($array)) && (!empty($array)) ) ? $array[0] : null;
    }

}