<?php

include_once './src/config/database.php';

class OrderRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders";
        $result = $this->connection->query($sql);

        if ($result === false) {
            die('Error en la consulta SQL: ' . $this->connection->error);
        }

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $order = new Order($row['id'], $row['user_id'], $row['total_price'], $row['product'], $row['quantity'], $row['total_price']);
            array_push($orders, $order);
        }

        return $orders;
    }

    public function createOrder(Order $order)
    {
        $sql = "INSERT INTO orders (user_id, product, quantity, total_price) VALUES ('" . $order->getUserId() . "', '" . $order->getProduct() . "', '" . $order->getQuantity() . "', '" . $order->getTotalPrice() . "')";
        $result = $this->connection->query($sql);

        if ($result === false) {
            die('Error en la consulta SQL: ' . $this->connection->error);
        }

        return $result;
    }
}
