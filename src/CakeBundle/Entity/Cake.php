<?php

namespace CakeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cakes")
 */
class Cake
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="SpongeType")
     * @ORM\JoinColumn(name="sponge_id", referencedColumnName="id")
     * @var SpongeType
     */
    private $spongeCake;
    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $numberOfFloors;
//    /**
//     * @var ArrayCollection
//     */
//    private $buttercreams;
//    /**
//     * @var ArrayCollection
//     */
//    private $frostings;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @var float
     */
    private $pricePerPortion;

    /**
     * @return float
     */
    public function getPricePerPortion()
    {
        return $this->pricePerPortion;
    }

    /**
     * @param float $pricePerPortion
     */
    public function setPricePerPortion($pricePerPortion)
    {
        $this->pricePerPortion = $pricePerPortion;
    }

    /**
     * @return int
     */
    public function getNumberOfFloors()
    {
        return $this->numberOfFloors;
    }

    /**
     * @param int $numberOfFloors
     */
    public function setNumberOfFloors($numberOfFloors)
    {
        $this->numberOfFloors = $numberOfFloors;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
