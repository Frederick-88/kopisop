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

    <link rel="stylesheet" href="../assets/styles/report.css">
    <title>Report</title>
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5 mb-5">
            <div class="bg-cart p-4 p-lg-5">

                <?php
                require '../model/Orders_Model.php';
                $orders = new Orders;
                $no = 1;
                $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                $result = $orders->getMonthOrder($year); ?>

                <form class="form-inline mb-4" method="GET">
                    <div class="form-group mb-2 ">
                        <label class="mr-2">Year </label>
                        <input type="number" name="year" class="form-control" min=1000 max=9999 value=<?php echo $year?> require>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 mb-2">Show Report</button>
                    <a class="ml-2 mb-2" href="../controller/Print_Controller.php?orderYear=<?php echo $year ?>"><span class="fas fa-print"></span> Print Here </a>
                </form>

                <?php if ($result->num_rows != 0) { ?>
                    <h1>Reports</h1>
                    <?php include '../component/graphic.php' ?>

                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="table-responsive mt-3 p-2">
                            <h2><?php echo $row['month_name'] ?></h2>

                            <?php $resultPerMonth = $orders->getOrderByMonth($row['month']) ?>
                            
                            <table class="table table-fixed">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($rowMonth = $resultPerMonth->fetch_assoc()) { ?>
                                        <tr>

                                            <th scope="row"><?php echo $no++ ?></th>
                                            <td><?php echo date('l, jS M Y', strtotime($rowMonth['date'])) ?></td>
                                            <td><?php echo "Rp" . number_format($rowMonth['total'], 0, ".", ".") ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="bg-light">
                                        <th class="text-center " scope="row" colspan="2">Total :</th>
                                        <td> <?php echo "Rp" . number_format($row['totalSum'], 0, ".", "."); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <h1>No Report</h1>
                    <p> You Doesn't Have an Report. <a href="report.php">Back</a></p>
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