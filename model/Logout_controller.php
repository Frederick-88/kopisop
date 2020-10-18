<?php

$mysqli = new mysqli('localhost', 'root', '', 'kopisop') or die(mysqli_error($mysqli));

session_start();

// destroy session
session_destroy();

header('location:../kopisop/login.php');
