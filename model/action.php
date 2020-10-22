<?php
require('../library/process.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $image = $_FILES['image']['name'];
    $explode=explode('.', $image);
    $ext = end($explode);
    $photo = '../model/Images/' . $name . '.' . $ext;

    move_uploaded_file($_FILES['image']['tmp_name'], $photo);

    $query = "INSERT INTO Food (name, price, food_pic, category_id) VALUE ('$name','$price','$photo','$category')";
    $result = $mysqli->query($query);

    header('location:../view/menu.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "SELECT food_pic FROM Food WHERE food_id=$id";
    $result2 = $mysqli->query($sql);
    $row = $result2->fetch_assoc();
    $imagepath = $row['food_pic'];
    unlink($imagepath);

    $query = "DELETE FROM Food WHERE food_id=$id";
    $result = $mysqli->query($query);

    header('location:../view/menu.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $oldimage = $_POST['oldimage'];

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        $new = $_FILES['image']['name'];
        unlink($oldimage);

        $ext = end(explode('.', $new));
        $photo = '../model/Images/' . $name . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $photo);
    } else {
        $photo = $oldimage;
    }

    $query = "UPDATE Food SET name='$name', price='$price', food_pic='$photo', category_id='$category' WHERE food_id='$id'";
    $result = $mysqli->query($query);

    header('location:../view/menu.php');
}
