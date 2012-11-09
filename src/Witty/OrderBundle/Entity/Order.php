<?php

namespace Witty\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//On doit escaper le nom de la table car "order" est un mot réservé de mysql

/**
 * Witty\OrderBundle\Entity\Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity
 */
class Order
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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="orderProduct")
     */
    protected $orderProducts;
	
    /**
     * @ORM\OneToOne(targetEntity="Promo")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
     **/
    protected $promo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add orderProducts
     *
     * @param Witty\OrderBundle\Entity\OrderProduct $orderProducts
     * @return Order
     */
    public function addOrderProduct(\Witty\OrderBundle\Entity\OrderProduct $orderProducts)
    {
        $this->orderProducts[] = $orderProducts;
    
        return $this;
    }

    /**
     * Remove orderProducts
     *
     * @param Witty\OrderBundle\Entity\OrderProduct $orderProducts
     */
    public function removeOrderProduct(\Witty\OrderBundle\Entity\OrderProduct $orderProducts)
    {
        $this->orderProducts->removeElement($orderProducts);
    }

    /**
     * Get orderProducts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getOrderProducts()
    {
        return $this->orderProducts;
    }

    /**
     * Set promo
     *
     * @param Witty\OrderBundle\Entity\Promo $promo
     * @return Order
     */
    public function setPromo(\Witty\OrderBundle\Entity\Promo $promo = null)
    {
        $this->promo = $promo;
    
        return $this;
    }

    /**
     * Get promo
     *
     * @return Witty\OrderBundle\Entity\Promo 
     */
    public function getPromo()
    {
        return $this->promo;
    }
}