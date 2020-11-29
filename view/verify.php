<?php
require '../model/Auth_Model.php';

$verify= new Auth;

$id = $_GET['id'];
$token = $_GET['token'];

$result = $verify->verify($id,$token);

if ($result) {
    echo "verify successful. you can log in now";
} else {
    echo "verify failed";
}
