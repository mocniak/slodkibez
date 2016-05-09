<?php

namespace CakeBundle\Entity;


class Order {

    /**
     * @var OrderItemInterface[]
     */
    private $orderItems;

    /**
     * @param OrderItemInterface[] $orderItems
     * @return Order
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * @return OrderItemInterface[]
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }
}