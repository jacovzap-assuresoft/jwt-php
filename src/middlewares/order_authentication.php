<?php

include_once './src/middlewares/authentication_proxy.php';
include_once './src/services/order_service.php';

class OrderAuthentication extends AuthenticationProxy
{
    private OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function getAllOrders()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if ($token == '1234') {
            return $this->service->getAllOrders();
        } else {
            return ['error' => 'Invalid token'];
        }
    }

    public function createOrder($body)
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if ($token == '1234') {
            return $this->service->createOrder($body);
        } else {
            return ['error' => 'Invalid token'];
        }
    }
}