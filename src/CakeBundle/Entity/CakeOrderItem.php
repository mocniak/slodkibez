<?php

namespace CakeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cake_order_items")
 */
class CakeOrderItem implements OrderItemInterface
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * @var Order
     */
    private $order;
    /**
     * @var string
     */
    private $name;
    /**
     * @ORM\OneToOne(targetEntity="Cake", cascade={"persist"})
     * @ORM\JoinColumn(name="cake_id", referencedColumnName="id" )
     * @var Cake
     */
    private $cake;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $portions;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $numberOfFloors;

    public function getPrice()
    {
        return $this->cake->getPricePerPortion() * $this->portions;
    }

    /**
     * @param string $name
     * @return CakeOrderItem
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $numberOfFloors
     * @return CakeOrderItem
     */
    public function setNumberOfFloors($numberOfFloors)
    {
        $this->numberOfFloors = $numberOfFloors;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfFloors()
    {
        return $this->numberOfFloors;
    }

    /**
     * @param mixed $id
     * @return CakeOrderItem
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Order $order
     * @return CakeOrderItem
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Cake $cake
     * @return CakeOrderItem
     */
    public function setCake($cake)
    {
        $this->cake = $cake;
        return $this;
    }

    /**
     * @return Cake
     */
    public function getCake()
    {
        return $this->cake;
    }

    /**
     * @param int $portions
     * @return CakeOrderItem
     */
    public function setPortions($portions)
    {
        $this->portions = $portions;
        return $this;
    }

    /**
     * @return int
     */
    public function getPortions()
    {
        return $this->portions;
    }

}