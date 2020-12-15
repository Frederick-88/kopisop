<?php
require_once '../library/process.php';

class Cart extends dbconnection
{
    public function getCartByUserId($id)
    {
        $query = "SELECT * FROM Cart INNER JOIN Food ON Cart.food_id=Food.food_id WHERE user_id=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function getTotalPrice($id)
    {
        $query = "SELECT SUM(quantity*price) AS total FROM Cart INNER JOIN Food ON Cart.food_id=Food.food_id WHERE user_id=$id";
        $result = $this->mysqli->query($query);
        $get = $result->fetch_assoc();
        $total = $get['total'];
        return $total;
    }

    public function getShipping()
    {
        $query = "SELECT shipping FROM other";
        $result = $this->mysqli->query($query);
        $get = $result->fetch_assoc();
        $shipping= $get['shipping'];
        return $shipping;
    }

    public function getTax($id)
    {
        $total= $this->getTotalPrice($id);

        $query = "SELECT tax FROM other";
        $result = $this->mysqli->query($query);
        $get = $result->fetch_assoc();

        $tax= $total * $get['tax']/100;
        return $tax;
    }
    
    

    public function deleteCartById($id)
    {
        $query = "DELETE FROM Cart WHERE cart_id=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function deleteAllCart($id)
    {
        $query = "DELETE FROM Cart WHERE user_id=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function updateQtyById($id, $quantity)
    {
        $query = "UPDATE Cart SET quantity='$quantity' WHERE cart_id='$id'";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function checkOut($id, $date, $tax, $shipping, $subtotal, $total)
    {
        $query = "INSERT INTO Orders (cust_id, date, tax, shipping, subtotal, total) VALUE ($id, '$date', $tax, $shipping, $subtotal, $total )";
        $result = $this->mysqli->query($query);
        $orderId = $this->mysqli->insert_id;

        if ($result) {
            $dataCart = $this->getCartByUserId($id);

            while ($rowData = $dataCart->fetch_assoc()) {
                $food_id = $rowData['food_id'];
                $quantity = $rowData['quantity'];
                $price = $rowData['price'];
                $total = $price * $quantity;

                $query2 = "INSERT INTO OrderItem (order_id, food_id, quantity, price, total) VALUE ($orderId,$food_id,$quantity,$price,$total)";
                $result2 = $this->mysqli->query($query2);
            }
            return $orderId;
            
        } else {
            return false;
        }
    }
}
