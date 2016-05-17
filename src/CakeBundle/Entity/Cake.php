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
     * @ORM\JoinColumn(name="sponge_id", referencedColumnName="id", nullable = false)
     * @var SpongeType
     */
    private $spongeType;
    /**
     * @ORM\ManyToOne(targetEntity="Frosting")
     * @ORM\JoinColumn(name="frosting_id", referencedColumnName="id", nullable = false)
     * @var Frosting
     */
    private $frosting;
    /**
     * @ORM\ManyToOne(targetEntity="Soak")
     * @ORM\JoinColumn(name="soak_id", referencedColumnName="id", nullable = false)
     * @var Soak
     */
    private $soak;

    /**
     * @ORM\ManyToMany(targetEntity="Buttercream")
     * @ORM\JoinColumn(name="buttercream_id", referencedColumnName="id")
     * @var ArrayCollection
     */
    private $buttercreams;

    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     * @var float
     */
    private $pricePerPortion;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    private $official;

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
     * @param SpongeType $spongeType
     * @return Cake
     */
    public function setSpongeType(SpongeType $spongeType = null)
    {
        $this->spongeType = $spongeType;

        return $this;
    }

    /**
     * Get spongeCake
     *
     * @return SpongeType
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
    public function setFrosting(Frosting $frosting)
    {
        $this->frosting = $frosting;
        return $this;
    }

    /**
     * @return Frosting
     */
    public function getFrosting()
    {
        return $this->frosting;
    }

    /**
     * @param Soak $soak
     * @return Cake
     */
    public function setSoak(Soak $soak)
    {
        $this->soak = $soak;
        return $this;
    }

    /**
     * @return Soak
     */
    public function getSoak()
    {
        return $this->soak;
    }

    /**
     * @param boolean $official
     * @return Cake
     */
    public function setOfficial($official)
    {
        $this->official = $official;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isOfficial()
    {
        return $this->official;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
