<?php
require '../../library/process.php';

$id = $_GET['id'];
$token = $_GET['token'];

$select = "UPDATE Customer SET verified = '1' WHERE user_id = '$id' AND token = '$token'";
$result = $mysqli->query($select);

if ($result) {
    echo "verify successful. you can log in now";
} else {
    echo "verify failed";
}
