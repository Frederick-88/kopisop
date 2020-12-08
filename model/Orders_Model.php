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

    public function getMonthOrder()
    {
        $query = "SELECT MONTH(date) AS month ,MONTHNAME(date) AS month_name, SUM(Total) AS totalSum FROM Orders GROUP BY(month)";
        $result = $this->mysqli->query($query);
        return !empty($result) ? $result : null;
    }

    public function getOrderByMonth($month)
    {
        $query = "SELECT * FROM Orders WHERE MONTH(date)=$month ORDER BY date ASC";
        $result = $this->mysqli->query($query);
        return !empty($result) ? $result : null;
    }

    public function getOrderAllMonth($year= null )
    {
        if(empty($year)){
            $year=date('Y');
        }

        for ($month = 1; $month < 13; $month++) {
            $query = "SELECT SUM(Total) AS total FROM Orders WHERE YEAR(date)=$year AND MONTH(date)=$month";
            $result = $this->mysqli->query($query);
            $setData=$result->fetch_assoc();
            $data[] = $setData['total'];
        }
        
        return $data;
    }
}
