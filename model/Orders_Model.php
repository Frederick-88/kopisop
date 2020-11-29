<?php
require_once '../library/process.php';

class Orders extends dbconnection
{
    public function getOrderUser($id)
    {
        $query = "SELECT * FROM Orders WHERE cust_id=$id";
        $result = $this->mysqli->query($query);
        return !empty($result) ? $result : false;
    }

    public function getOrderDetail($id)
    {
        $query = "SELECT *, OrderItem.price AS oip FROM OrderItem INNER JOIN Food ON OrderItem.food_id=Food.food_id WHERE order_id=$id";
        $result = $this->mysqli->query($query);
        return !empty($result) ? $result : null;
    }
}
