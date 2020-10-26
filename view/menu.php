<?php include "../library/process.php" ?>
<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet" href="../styles/menu.css">
</head>

<body>
    <?php include "../component/navbar.php";
    '../model/query_image.php'; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="bg-menu p-5">
                <?php if ($_SESSION['role'] === "1") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                        Add Food Here
                    </button>
                    <?php include '../component/modal_add.php' ?>
                <?php } ?>
                <?php
                require '../library/process.php';
                $query = "SELECT * FROM Food";
                $result = $mysqli->query($query);
                ?>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    <?php while($row=$result->fetch_assoc()){?>
                    <div class="col mt-4 mb-4">
                        <div class="card mb-4">
                            <div class="view overlay">
                                <img class="card-img-top" src="<?php echo $row['food_pic'] ?>">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><b><?= $row['name']; ?></b></h4>
                                <p class="card-text">
                                    Price : Rp <?php echo number_format($row['price'], 0, ".", "."); ?>
                                </p>
                                <?php if ($_SESSION['role'] === "1") { ?>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $row['food_id'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDel<?= $row['food_id'] ?>">Delete</button>
                                    <?php
                                    include '../component/modal_delete.php';
                                    include '../component/modal_edit.php'
                                    ?>
                                    <?php }else {?>
                                    <button type="button" class="btn btn-danger btn-block">Add to Cart</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>


            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>