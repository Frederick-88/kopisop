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

    <link rel="stylesheet" href="../assets/styles/history.css">
    <title>History</title>
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5 mb-5">
            <div class="bg-cart p-4 p-lg-5">
                <?php
                $id = $_SESSION['id'];
                $no = 1;

                require '../model/Orders_Model.php';
                $orders = new Orders;
                $result = $orders->getOrderUser($_SESSION['id']);

                if ($result->num_rows != 0) {
                ?>
                    <h1>Your History</h1>

                    <div class="table-responsive mt-3 p-2">
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Shipping</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-inline-flex flex-row align-items-center">
                                                <button type="button" class="icon-button clickable" data-toggle="collapse" data-target="#row-collapse-<?php echo $row['order_id'] ?>">
                                                    <span class="fa fa-sort-down"></span>
                                                </button>
                                                <?php echo $no++ ?>
                                            </div>
                                        </th>
                                        <td><?php echo date('l, jS M Y', strtotime($row['date'])) ?></td>
                                        <td><?php echo "Rp" . number_format($row['tax'], 0, ".", ".") ?></td>
                                        <td><?php echo "Rp" . number_format($row['shipping'], 0, ".", ".") ?></td>
                                        <td><?php echo "Rp" . number_format($row['subtotal'], 0, ".", ".") ?></td>
                                        <td><?php echo "Rp" . number_format($row['total'], 0, ".", ".") ?></td>
                                    </tr>
                                    <tr id="row-collapse-<?php echo $row['order_id'] ?>" class="collapse">
                                        <td colspan="6">
                                            <div class="card w-100 border border-danger">
                                                <div class="card-header bg-danger text-light">
                                                    Order Detail
                                                </div>
                                                <div class="card-body">

                                                    <?php
                                                    $detail = $orders->getOrderDetail($row['order_id']);
                                                    $noDetail = 1;
                                                    ?>

                                                    <table class="w-100">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No.</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">quantity</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php while ($rowDetail = $detail->fetch_assoc()) { ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $noDetail++ ?></th>
                                                                    <td><?php echo $rowDetail['name'] ?></td>
                                                                    <td><?php echo $rowDetail['quantity'] ?>x</td>
                                                                    <td><?php echo "Rp" . number_format($rowDetail['oip'], 0, ".", ".") ?></td>
                                                                    <td><?php echo "Rp" . number_format($rowDetail['total'], 0, ".", ".") ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                <?php } else { ?>
                    <h1>Oops!</h1>
                    <p> You Doesn't Have an History. <a href="menu.php">Look and Order Now</a></p>
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