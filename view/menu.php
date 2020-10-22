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
                        <div class="col mb-4">
                            <div class="card">
                                <img class="card-img" name="food_pic" src="../assets/images/iced_cappucino.jpg" alt="...">
                                <div class="card-img-overlay text-white d-flex flex-column justify-content-end">
                                    <h4 class="card-title">Iced Coffee</h4>
                                    <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                                    <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                                    <div class="link d-flex">
                                        <a href="#" class="card-link text-warning">Read More</a>
                                        <a href="#" class="card-link text-warning">Book a Trip</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <?php if (isset($_SESSION['role']) == "1") { ?>
                                    <div class="col-md-6">
                                        <a href="#" type="button" name="edit_menu" class="btn btn-secondary"    data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>"> Edit</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" type="button" name="delete_menu" class="btn btn-danger" data-toggle="modal" data-target="#modalDel<?= $row['id'] ?>">Delete</a>
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
                                

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modalDel<?= $row['id'] ?>" tabindex="-1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete the Food</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this food?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="query_image.php?delete_menu=<?= $row['id']; ?>" class="btn btn-danger mr-2">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit the Food</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    <input name="id" type="hidden" value="<?= $row['id'] ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Name Food Here" value="<?= $row['name'] ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="number" name="price" class="form-control" min="0" placeholder="How Much the Price" value="<?= $row['price'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="oldimage" value="<?= $row['food_pic'] ?>">
                                                        <input type="file" name="food_pic" class="custom-file">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="save_menu" name="edit_menu" class="btn btn-success" value="Edit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

            <?php } ?>



            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>