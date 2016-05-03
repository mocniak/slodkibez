<?php

namespace CakeBundle\Entity;


interface OrderItemInterface {
    public function getName();
    public function getPrice();
}