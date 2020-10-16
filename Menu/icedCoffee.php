<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List for Iced Coffee</title>

    <link rel="stylesheet" href="menu.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/menu.css">
</head>

<body>
    <div class="bg-custom">
        <?php include "./navbar.php"; ?>

        <div class="bg-menu container mt-5">
            <div class="ml-5 mr-5" id="top-header">
                <nav class="nav justify-content-center bg-light">
                    <a class="nav-item nav-link" href="./Menu/hotCoffee.php">hot coffee</a>
                    <a class="nav-item nav-link" href="./Menu/icedCoffee.php">iced coffee</a>
                    <a class="nav-item nav-link" href="./Menu/nonCoffee.php">non-coffee</a>
                    <a class="nav-item nav-link" href="./Menu/Snack.php">snack</a>
                </nav>
            </div>

            <div class="container mt-5 pt-5">
                <div class="row m-5">
                    <div class="col-4">
                        <div class="card border-0 rounded">
                            <img class="card-img" src="assets/images/coffee1.jpg" alt="Card image">
                            <button type="button" class="btn btn-info">Add</button>
                        </div>
                        
                    </div>
                    <div class="col-4">
                        <div class="card card border-0 rounded">
                            <img class="card-img" src="assets/images/coffee1.jpg" alt="Card image">
                            <button type="button" class="btn btn-info">Add</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card border-0 rounded">
                            <img class="card-img" src="assets/images/coffee1.jpg" alt="Card image">
                            <button type="button" class="btn btn-info">Add</button>
                        </div>
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