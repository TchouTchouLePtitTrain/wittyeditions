<?php

namespace Witty\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//On doit escaper le nom de la table car "order" est un mot réservé de mysql

/**
 * Witty\OrderBundle\Entity\Order
 *
 * @ORM\Table(name="`order`")
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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="orderProduct", cascade={"persist"})
     */
    protected $orderProducts;
	
    /**
     * @ORM\OneToOne(targetEntity="Promo")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
     **/
    protected $promo;

    /**
     * @var \DateTime $creationDate
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;
		
    /**
     * @var boolean $franco
     *
     * @ORM\Column(name="franco", type="boolean", nullable=false)
     */
    private $franco;
	
    /**
     * @var decimal $shipping
     *
     * @ORM\Column(name="shipping", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $shipping;

    /**
     * @var decimal $htAmount
     *
     * @ORM\Column(name="ht_amount", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $htAmount;
	
    /**
     * @var decimal $ttcAmount
     *
     * @ORM\Column(name="ttc_amount", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $ttcAmount;


	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderProducts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate = new \DateTime();
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

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Order
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set franco
     *
     * @param boolean $franco
     * @return Order
     */
    public function setFranco($franco)
    {
        $this->franco = $franco;
    
        return $this;
    }

    /**
     * Get franco
     *
     * @return boolean 
     */
    public function getFranco()
    {
        return $this->franco;
    }

    /**
     * Set shipping
     *
     * @param float $shipping
     * @return Order
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    
        return $this;
    }

    /**
     * Get shipping
     *
     * @return float 
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set htAmount
     *
     * @param float $htAmount
     * @return Order
     */
    public function setHtAmount($htAmount)
    {
        $this->htAmount = $htAmount;
    
        return $this;
    }

    /**
     * Get htAmount
     *
     * @return float 
     */
    public function getHtAmount()
    {
        return $this->htAmount;
    }

    /**
     * Set ttcAmount
     *
     * @param float $ttcAmount
     * @return Order
     */
    public function setTtcAmount($ttcAmount)
    {
        $this->ttcAmount = $ttcAmount;
    
        return $this;
    }

    /**
     * Get ttcAmount
     *
     * @return float 
     */
    public function getTtcAmount()
    {
        return $this->ttcAmount;
    }
}