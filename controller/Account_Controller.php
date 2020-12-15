<?php

require '../model/Auth_Model.php';

session_start();

$auth = new Auth;

// LOGIN
if (isset($_POST['edit_user'])) {
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $result = $auth->editUserById($id, $name, $phone, $address);

    if ($result) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success update data";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed update data";
        $_SESSION['type'] = 'alert-danger';
    }
    header('location:../view/account.php');
}
