<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/styles/navbar.css">
    <link rel="stylesheet" href="../assets/styles/alert.css">

    <link rel="stylesheet" href="../assets/styles/cart.css">
    <title>Cart</title>
</head>

<body>
    <?php 
    include "../component/navbar.php";
    include "../component/alert.php"; 
    ?>
    
    <div class="bg-custom">
        <div class="container mt-5 mb-5">
            <div class="bg-cart p-4 p-lg-5">
                <?php
                $id = $_SESSION['id'];

                $dateNow = date("Y-m-d");
                $no = 1;
                $shipping = 10000;

                require '../model/Cart_Model.php';
                $cart = new Cart;
                $result = $cart->getCartByUserId($_SESSION['id']);

                if ($result->num_rows != 0) {
                ?>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <h1>Your Order</h1>
                        <h6>Date : <?php echo $dateNow ?></h6>
                    </div>

                    <div class="table-responsive mt-3 p-2">
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-inline-flex flex-row align-items-center">
                                                <button type="button" class="icon-button" data-toggle="modal" data-target="#modalDelById<?= $row['cart_id'] ?>">
                                                    <span class="fa fa-trash"></span>
                                                </button>
                                                <?php echo $no++ ?>
                                            </div>
                                        </th>
                                        <td>
                                            <img src="<?php echo $row['food_pic'] ?>" alt="" class="img-thumbnail" style="width:50px; height:50px">
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <div class="d-inline-flex flex-row align-items-center">
                                                <?php echo $row['quantity'] ?>
                                                <button type="button" class="icon-button" data-toggle="modal" data-target="#modalEditQty<?= $row['cart_id'] ?>">
                                                    <span class="fa fa-pencil"></span>
                                                </button>
                                            </div>
                                        </td>
                                        <td> <?php echo "Rp" . number_format($row['price'] * $row['quantity'], 0, ".", "."); ?></td>
                                    </tr>

                                <?php
                                    include '../component/modal/modal_cart/modal_editQty.php';
                                    include '../component/modal/modal_cart/modal_deleteById.php';
                                } ?>

                                <?php
                                $subtotal = $cart->getTotalPrice($_SESSION['id'])
                                ?>

                                <tr>
                                    <th class="text-center" scope="row" colspan="3">Subtotal :</th>
                                    <td> <?php echo "Rp" . number_format($subtotal, 0, ".", "."); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center border-0" scope="row" colspan="3">Shipping :</th>
                                    <td class="border-0"> <?php echo "Rp" . number_format($shipping, 0, ".", "."); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center border-0" scope="row" colspan="3">Tax :</th>
                                    <td class="border-0">
                                        <?php $tax = $subtotal * 0.1;
                                        echo "Rp" . number_format($tax, 0, ".", "."); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center border-0" scope="row" colspan="3">Total :</th>
                                    <td class="border-0">
                                        <?php $total = $subtotal + $shipping + $tax;
                                        echo "Rp" . number_format($total, 0, ".", "."); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelAll">
                            <span class="fa fa-trash"></span>
                            Delete All
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCheckOut">
                            <span class="far fa-arrow-alt-circle-right"></span>
                            Check Out
                        </button>

                        <?php
                        include '../component/modal/modal_cart/modal_deleteAll.php';
                        include '../component/modal/modal_cart/modal_checkOut.php';
                        ?>
                    </div>
                <?php } else { ?>
                    <h1>Oops!</h1>
                    <p> You Doesn't make an order here. <a href="menu.php">Look and Order Now</a></p>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>