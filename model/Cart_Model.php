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

                if (!$result2) {
                    break;
                    $query3 = "DELETE FROM Orders WHERE order_id=$orderId";
                    $result3 = $this->mysqli->query($query3);

                    if ($result3) {
                        $query4 = "DELETE FROM OrderItem WHERE order_id=$orderId";
                        $result4 = $this->mysqli->query($query4);
                        return false;
                        exit;
                    }
                } else {
                    continue;
                }
            }
            $query5 = "SELECT * FROM OrderItem WHERE order_id=$orderId";
            $result5 = $this->mysqli->query($query5);
            return !empty($result5)? $result5:false;

        } else {
            return false;
        }
    }
}
