<?php

namespace CakeBundle\Entity;

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
     * @var string
     */
    private $name;
    /**
     * @ORM\OneToOne(targetEntity="Cake")
     * @ORM\JoinColumn(name="cake_id", referencedColumnName="id")
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

}