<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kopisop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/navbar.css">

    <link rel="stylesheet" href="../assets/styles/index.css">
</head>

<body>
    <?php include '../component/navbar.php'; ?>
    <div class="bg-image">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="mt-md-5 pt-5">
                        <h1>Start your day with kopisop</h1>
                        <p>Established at 2020, we create our coffee handmade and serve it with pride.</p>
                        <div class="mt-md-5 pt-md-5">
                            <h3 class="leading">Our recommendations</h3>

                            <?php
                            require '../model/Food_Model.php';
                            $foodAll=new Food;
                            $result = $foodAll->getAllFood();
                            ?>
                            <div class="recommend-wrapper">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="recommend-block">
                                        <div class="card" class="w-100 h-100">
                                            <img class="card-img" src="<?php echo $row['food_pic'] ?>" alt="foods">
                                            <div class="card-img-overlay">
                                                <p class="card-title"><?php echo $row['name'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/tangan_kopisop.png" class="mt-xl-0 mt-lg-5 mt-md-0 img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>