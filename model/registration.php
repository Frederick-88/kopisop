<?php
session_start();

require_once "../library/process.php";

$name = '';
$email = '';
$password = '';

$errors = array();

// register users
if (isset($_POST['reg_user'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

}

// lanjut besok
