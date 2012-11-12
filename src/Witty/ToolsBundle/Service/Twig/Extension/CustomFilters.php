<?php

namespace Witty\ToolsBundle\Service\Twig\Extension;


class CustomFilters extends \Twig_Extension
{	

	public function getName()
    {
        return 'EntityManager';
    }

    public function getFilters()
    {
        return array(
            'first' => new \Twig_Filter_Method($this, 'firstFilter'),
        );
    }


    /**
     * Renvoie le premier élément d'un Array
     * 
     * @param Array $array
     */
    public function firstFilter($array)
    {
        return ((isset($array)) && (!empty($array)) ) ? $array[0] : null;
    }

}