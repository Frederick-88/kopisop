<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet" href="../styles/cart.css">
    <title>Cart</title>
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="bg-cart p-3 p-lg-5">
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <?php
                    $dateNow = date("d-m-Y");
                    $no = 1;
                    $id = $_SESSION['id'];

                    require '../library/process.php';
                    $query = "SELECT * FROM Cart JOIN Food ON Cart.food_id=Food.food_id WHERE user_id=$id";
                    $result = $mysqli->query($query);

                    ?>

                    <h2>Your Order</h2>
                    <h6>Date : <?php echo $dateNow ?></h6>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td>
                                        <img src="<?php echo $row['food_pic'] ?>" alt="" class="img-thumbnail" style="width:50px; height:50px">
                                        <?php echo $row['name'] ?>
                                    </td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td>Rp <?php echo number_format($row['price'] * $row['quantity'], 0, ".", "."); ?></td>
                                </tr>
                            <?php } ?>
                            <?php
                            $sum = "SELECT SUM(quantity*price) AS total FROM Cart INNER JOIN Food ON Cart.food_id=Food.food_id WHERE user_id=$id";
                            $total = $mysqli->query($sum);
                            $totalSum = $total->fetch_assoc();
                            $price = $totalSum['total']
                            ?>
                            <tr>
                                <th class="text-center" scope="row" colspan="3">Total :</th>
                                <td>Rp <?php echo number_format($price, 0, ".", "."); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>