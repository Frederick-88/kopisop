<?php
require_once '../library/process.php';

class Food extends dbconnection
{
    
    public function getAllFood()
    {
        $query = "SELECT * FROM Food";
        $result = $this->mysqli->query($query);
        return !empty($result)? $result:false;
    }

    public function getAllCategory()
    {
        $query = "SELECT * FROM Category";
        $result = $this->mysqli->query($query);
        return !empty($result)? $result:false;
    }

    public function getFoodById($id)
    {
        $query = "SELECT * FROM Food WHERE food_id=$id";
        $result = $this->mysqli->query($query);
        return !empty($result)? $result:false;
    }

    public function insertFood($name, $price, $category, $image, $tmp)
    {
        $photo = '../controller/Images/' . $image;

        move_uploaded_file($tmp, $photo);
        $query = "INSERT INTO Food (name, price, food_pic, category_id) VALUE ('$name',$price,'$photo','$category')";
        $result = $this->mysqli->query($query);
        return !empty($result)? true:false;
    }

    public function deleteFoodById($id)
    {
        $get = $this->getFoodById($id);
        $setImage=$get->fetch_assoc();
        $imagepath = $setImage['food_pic'];
        unlink($imagepath);

        $query = "DELETE FROM Food WHERE food_id=$id";
        $result = $this->mysqli->query($query);
        return !empty($result)? true:false;
    }

    public function editFoodById($id, $name, $price, $category, $oldimage, $newimage, $tmp)
    {
        if (isset($newimage) && ($newimage != "")) {
            unlink($oldimage);

            $photo = '../controller/Images/' . $newimage;
            move_uploaded_file($tmp, $photo);
        } else {
            $photo = $oldimage;
        }

        $query = "UPDATE Food SET name='$name', price='$price', food_pic='$photo', category_id='$category' WHERE food_id='$id'";
        $result = $this->mysqli->query($query);
        return !empty($result)? true:false;
    }

    public function addToCart($food_id, $user, $quantity)
    {
        $query = "SELECT * FROM Cart WHERE food_id=$food_id AND user_id=$user";
        $result = $this->mysqli->query($query);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $totalQuantity = $quantity + $row['quantity'];
            $cart = $row['cart_id'];
            $update = "UPDATE Cart SET quantity=$totalQuantity WHERE cart_id=$cart";
            $stmt = $this->mysqli->query($update);
        } else {
            $insert = "INSERT Cart SET user_id=$user, food_id=$food_id, quantity=$quantity";
            $stmt = $this->mysqli->query($insert);
        }
        return !empty($stmt)? true:false;
    }
}
