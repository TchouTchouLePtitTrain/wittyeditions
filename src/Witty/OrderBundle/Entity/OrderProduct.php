<?php

namespace Witty\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\OrderBundle\Entity\OrderProduct
 *
 * @ORM\Table(name="orderproduct")
 * @ORM\Entity
 */
class OrderProduct
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
	 * @ORM\ManyToOne(targetEntity="\Witty\UserBundle\Entity\User", inversedBy="orderProducts")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
	protected $order;
	
	/**
     * @ORM\OneToOne(targetEntity="Product")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
	
	/**
     * @var integer $quantity
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;
	
    /**
     * @var decimal $prixHT
     *
     * @ORM\Column(name="prix_ht", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $unitPrice;
	


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
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     * @return OrderProduct
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    
        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set order
     *
     * @param Witty\UserBundle\Entity\User $order
     * @return OrderProduct
     */
    public function setOrder(\Witty\UserBundle\Entity\User $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return Witty\UserBundle\Entity\User 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set product
     *
     * @param Witty\OrderBundle\Entity\Product $product
     * @return OrderProduct
     */
    public function setProduct(\Witty\OrderBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return Witty\OrderBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}