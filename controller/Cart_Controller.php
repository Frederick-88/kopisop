<?php

session_start();
require('../model/Cart_Model.php');

$cart = new Cart;

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    $deleteCartById = $cart->deleteCartById($id);
    
    if ($deleteCartById) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success delete";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed delete";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/cart.php');
}

if (isset($_POST['updateQty'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $updateQty = $cart->updateQtyById($id, $quantity);

    if ($updateQty) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success update quantity of food";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed delete quantity of food";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/cart.php');
}

if (isset($_GET['deleteAll'])) {
    $id = $_GET['deleteAll'];
    
    $deleteAll = $cart->deleteAllCart($id);
    
    if ($deleteAll) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success delete your Cart";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed delete your Cart";
        $_SESSION['type'] = 'alert-danger';
    }
    
    header('location:../view/menu.php');
}

if (isset($_POST['checkOut'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $tax = $_POST['tax'];
    $shipping = $_POST['shipping'];
    $subtotal = $_POST['subtotal'];
    $total = $_POST['total'];

    $checkOut=$cart->checkOut($id, $date, $tax, $shipping, $subtotal, $total);

    if ($checkOut) {
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Success Order Food. Check on History";
        $_SESSION['type'] = 'alert-success';
    }else{
        $_SESSION['notif_menu']=true;
        $_SESSION['message'] = "Failed Order. Please Try Again";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/menu.php');
}
