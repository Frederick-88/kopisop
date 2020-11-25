<?php

require('../library/process.php');

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    $query = "DELETE FROM Cart WHERE cart_id=$id";
    $result = $mysqli->query($query);

    header('location:../view/cart.php');
}

if (isset($_POST['updateQty'])) {
    $id = $_POST['id'];
    $quantity= $_POST['quantity'];

    $query = "UPDATE Cart SET quantity='$quantity' WHERE cart_id='$id'";
    $result = $mysqli->query($query);

    header('location:../view/cart.php');
}

if (isset($_GET['deleteAll'])) {
    $id = $_GET['deleteAll'];

    $query = "DELETE FROM Cart WHERE user_id=$id";
    $result = $mysqli->query($query);

    header('location:../view/cart.php');
}