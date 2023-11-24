<?php

include_once './src/middlewares/service.php';
include_once './src/repositories/order_repository.php';

class OrderService implements Service
{
    private $order_repository;

    public function __construct()
    {
        $this->order_repository = new OrderRepository();
    }

    public function getAllOrders()
    {
        return $this->order_repository->getAllOrders();
    }

    public function createOrder($body)
    {
        $order = new Order(null, $body['user_id'], $body['product'], $body['quantity'], $body['total_price']);
        return $this->order_repository->createOrder($order);
    }
}
