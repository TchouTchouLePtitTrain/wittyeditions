<?php

namespace Witty\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\OrderBundle\Entity\Promo
 *
 * @ORM\Table(name="promo")
 * @ORM\Entity
 */
class Promo
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
	
    /**
     * @var decimal $prixHT
     *
     * @ORM\Column(name="prix_ht", type="decimal", precision=8, scale=2, nullable=false)
     */
    protected $amount;
	
    /**
     * @var string $image
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $code;	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Promo
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Promo
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
}