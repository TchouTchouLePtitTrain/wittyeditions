<?php

namespace Witty\ToolsBundle\Service\Twig\Extension;


class CustomTags extends \Twig_Extension
{	

	public function getName()
    {
        return 'CustomTags';
    }

    public function getFunctions()
    {
        return array(
            'min' => new \Twig_Function_Method($this, 'min'), 
            'max' => new \Twig_Function_Method($this, 'max'), 
            'first' => new \Twig_Function_Method($this, 'first')
        );
    }


    /**
     * Fonction min
     * 
     */
    public function min($x, $y)
    {
        return min($x, $y);
    }

    /**
     * Fonction max
     * 
     */
    public function max($x, $y)
    {
        return max($x, $y);
    }

    /**
     * Fonction first
     * 
     */
    public function first($x)
    {
        return $x->first();
    }

}