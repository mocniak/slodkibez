<?php
/**
 * Created by PhpStorm.
 * User: mocniak
 * Date: 30.04.16
 * Time: 20:42
 */

namespace CakeBundle\Entity;


class CakeOrderItem implements OrderItemInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Cake
     */
    private $cake;

    /**
     * @var integer
     */
    private $portions;

    /**
     * @var integer
     */
    private $diameter;

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

}