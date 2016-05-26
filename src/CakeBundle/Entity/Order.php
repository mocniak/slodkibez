<?php

namespace CakeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

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


    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $deliveryDate;


    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $orderDate;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $email;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $notes;

    /**
     * @param mixed $id
     * @return Order
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
     * @param \DateTime $deliveryDate
     * @return Order
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param string $phone
     * @return Order
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $email
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * @return Order
     */
    public function setPortions($portions)
    {
        $this->portions = $portions;
        return $this;
    }

    /**
     * @param int $numberOfFloors
     * @return Order
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
     * @return int
     */
    public function getPortions()
    {
        return $this->portions;
    }

    /**
     * @param string $notes
     * @return Order
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @param \DateTime $orderDate
     * @return Order
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return \DateTime
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param Cake $cake
     * @return Order
     */
    public function setCake($cake)
    {
        $this->cake = $cake;
        return $this;
    }

    public function __toString()
    {
        return (string)$this->cake. ", " . $this->portions ." porcji";
    }
    public function getName() {
        return (string)$this;
    }
}