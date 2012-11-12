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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="order", cascade={"persist"})
     */
    protected $orderProducts;
	
    /**
     * @ORM\OneToOne(targetEntity="Promo")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
     **/
    protected $promo;
	
	/**
     * @ORM\ManyToOne(targetEntity="\Witty\UserBundle\Entity\User", inversedBy="orders")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var \DateTime $creationDate
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;
	
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
		$this->recalculate();
	
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
		$this->recalculate();
    
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
     * Set shipping
     *
     * @param float $shipping
     * @return Order
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
		$this->recalculate();
		
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
	
	private function recalculate()
	{
		$this->htAmount = 0;
		
		
		//Calcul du total HT (sans les frais de port)
		foreach($this->orderProducts as $orderProduct)
		{
			$this->htAmount += $orderProduct->getUnitPrice() * $orderProduct->getQuantity();
		}
		
		//Calcul du total TTC (frais de port inclus)
		$this->ttcAmount = $this->htAmount * 1.196 + $this->shipping;
	}

    /**
     * Set user
     *
     * @param Witty\UserBundle\Entity\User $user
     * @return Order
     */
    public function setUser(\Witty\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Witty\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}