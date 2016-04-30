<?php
/**
 * Created by PhpStorm.
 * User: mocniak
 * Date: 30.04.16
 * Time: 20:42
 */

namespace CakeBundle\Entity;


class CakeOrder implements OrderElement
{
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

    public function getPrice()
    {
        return $this->cake->getPricePerPortion() * $this->portions;
    }

}