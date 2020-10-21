<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu kopisop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css?">

    <link rel="stylesheet" href="../styles/menu.css">
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="bg-menu p-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

                    <?php
                    $dataPerPage = 6;
                    $query = "SELECT * FROM Food";
                    $totaldata = mysqli_num_rows($mysqli->query($query));
                    $totalPage = ceil($totaldata / $dataPerPage);

                    $page = isset($_GET['pages']) ? $_GET['pages'] : 1;

                    $data = ($page * $dataPerPage) - $dataPerPage;
                    $query = "SELECT * FROM Food LIMIT $data, $dataPerPage";
                    $result = $mysqli->query($query);
                    ?>

                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="col mt-4 mb-4">
                            <div class="card">
                                <img class="card-img" src="../assets/images/coffee1.jpg" alt="...">
                                <div class="card-img-overlay text-white d-flex flex-column justify-content-end">
                                    <h4 class="card-title">Bologna</h4>
                                    <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                                    <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                                    <div class="link d-flex">
                                        <a href="#" class="card-link text-warning">Read More</a>
                                        <a href="#" class="card-link text-warning">Book a Trip</a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row" style="margin-top: 10px">
                                        <?php if (isset($_SESSION['role']) == "1") { ?>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>"> Edit</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalDel<?= $row['id'] ?>">Delete</button>
                                            </div>

                                        <?php } else { ?>
                                            <div class="col-md-6">
                                                <h1 name="name">Food Name</h1>
                                                <h6 name="price">Price : Rp. <?= number_format($row['price'], 0, ".", "."); ?></h6>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" name="add_cart" class="btn btn-danger"><i class="fas fa-cart-plus"></i>Add to cart</button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                include '../component/modal_delete.php';
                                include '../component/modal_edit.php'?>
                                
                        <?php } ?>

                        </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>