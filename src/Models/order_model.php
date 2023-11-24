<?php

class Order
{
    private $id;
    private $user_id;
    private $product;
    private $quantity;
    private $total_price;

    public function __construct($id, $user_id, $product, $quantity, $total_price)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->total_price = $total_price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }
}