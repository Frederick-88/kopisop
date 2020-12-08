<?php
require('../model/Food_Model.php');
session_start();

$food = new Food();

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $insertfood = $food->insertFood($name, $price, $category, $image, $tmp);
    
    if ($insertfood) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success add food";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed add food";
        $_SESSION['type'] = 'alert-danger';
    }
    header('location:../view/menu.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $deleteFoodById = $food->deleteFoodById($id);
    
    if ($deleteFoodById) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success delete food";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed delete food";
        $_SESSION['type'] = 'alert-danger';
    }
    header('location:../view/menu.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $oldimage = $_POST['oldimage'];
    $newimage = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $editFood = $food->editFoodById($id, $name, $price, $category, $oldimage, $newimage, $tmp);
    
    if ($editFood) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success update the food";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed update the food";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/menu.php');
}

if (isset($_POST['add_cart'])) {
    $food_id = $_POST['food_id'];
    $user = $_POST['user_id'];
    $quantity = $_POST['quantity'];

    $add = $food->addToCart($food_id, $user, $quantity);

    if ($add) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success add to cart";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed add to cart";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/menu.php');
}
