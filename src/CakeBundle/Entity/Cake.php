<?php
/**
 * Created by PhpStorm.
 * User: mocniak
 * Date: 30.04.16
 * Time: 20:34
 */

namespace CakeBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Cake
{
    /**
     * @var SpongeType
     */
    private $spongeCake;
    /**
     * @var integer
     */
    private $numberOfFloors;
    /**
     * @var ArrayCollection
     */
    private $buttercreams;
    /**
     * @var ArrayCollection
     */
    private $frostings;

    /**
     * @var float
     */
    private $pricePerPortion;

    /**
     * @var boolean
     */
    private $isVegan;

    /**
     * @var boolean
     */
    private $gotMilk;

    /**
     * @var boolean
     */
    private $isNutFree;

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
}