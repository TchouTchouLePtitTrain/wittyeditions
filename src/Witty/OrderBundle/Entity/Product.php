<?php

namespace Witty\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\OrderBundle\Entity\Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Witty\OrderBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="product")
     **/
	protected $orderProducts;
	
    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;
		
    /**
     * @var string $catchphrase
     *
     * @ORM\Column(name="catchphrase", type="string", length=255, nullable=false)
     */
    private $catchphrase;
	
    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
	
    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
	
    /**
     * @var decimal $prixHT
     *
     * @ORM\Column(name="prix_ht", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $unitPrice;
	
    /**
     * @var decimal $priority
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority;
	

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
     * Set title
     *
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Product
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     * @return Product
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
     * Constructor
     */
    public function __construct()
    {
        $this->orderProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add orderProducts
     *
     * @param Witty\OrderBundle\Entity\OrderProduct $orderProducts
     * @return Product
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
     * Set catchphrase
     *
     * @param string $catchphrase
     * @return Product
     */
    public function setCatchphrase($catchphrase)
    {
        $this->catchphrase = $catchphrase;
    
        return $this;
    }

    /**
     * Get catchphrase
     *
     * @return string 
     */
    public function getCatchphrase()
    {
        return $this->catchphrase;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return Product
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }
}