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
    private $spongeType;
    /**
     * @ORM\ManyToOne(targetEntity="Frosting")
     * @ORM\JoinColumn(name="frosting_id", referencedColumnName="id")
     * @var Frosting
     */
    private $frosting;
    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $numberOfFloors;
    /**
     * @ORM\ManyToMany(targetEntity="Buttercream")
     * @ORM\JoinColumn(name="buttercream_id", referencedColumnName="id")
     * @var ArrayCollection
     */
    private $buttercreams;

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

    /**
     * Set spongeCake
     *
     * @param \CakeBundle\Entity\SpongeType $spongeType
     * @return Cake
     */
    public function setSpongeType(\CakeBundle\Entity\SpongeType $spongeType = null)
    {
        $this->spongeType = $spongeType;

        return $this;
    }

    /**
     * Get spongeCake
     *
     * @return \CakeBundle\Entity\SpongeType 
     */
    public function getSpongeType()
    {
        return $this->spongeType;
    }

    /**
     * @param ArrayCollection $buttercreams
     * @return Cake
     */
    public function setButtercreams($buttercreams)
    {
        $this->buttercreams = $buttercreams;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getButtercreams()
    {
        return $this->buttercreams;
    }

    /**
     * @param Frosting $frosting
     * @return Cake
     */
    public function setFrosting($frosting)
    {
        $this->frosting = $frosting;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrosting()
    {
        return $this->frosting;
    }
}
