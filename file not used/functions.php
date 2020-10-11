<?php

$mysqli = mysqli_connect("localhost", "root", "", "food-project");

// Getting the Categories
function getCats() {
    
    global $mysqli;

    $get_cats = "SELECT * FROM categories";

    $run_cats = mysqli_query($mysqli, $get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
    
    echo "<li><a href='#'>$cat_title</a></li>";
    
    }
}

// Getting the Brands

function getBrands() {
    
    global $mysqli;

    $get_brands = "SELECT * FROM brands";

    $run_brands = mysqli_query($mysqli, $get_brands);

    while($row_brands=mysqli_fetch_array($run_brands)) {
        $brands_id = $row_brands['brands_id'];
        $brands_title = $row_brands['brands_title'];
    
    echo "<li><a href='#'>$brands_title</a></li>";
    
    }
}

function getPro() {

    global $mysqli;

    $get_pro = "SELECT * FROM food ORDER BY RAND() LIMIT 0,6";
    $run_pro = mysqli_query($mysqli, $get_pro);
}






?>