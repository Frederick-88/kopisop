<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kopisop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">

    <link rel="stylesheet" href="styles/index.css?<?= time() ?>">
</head>

<body>
    <div class="bg-image">
        <?php include 'navbar.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class=" container mt-5 pt-5">
                        <h1>Start your day with kopisop</h1>
                        <p>Established at 2020, we create our coffee handmade and serve it with pride.</p>
                        <div class="mt-md-5 pt-md-5">
                            <h3 class="leading">Our recommendations</h3>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card border-0 rounded">
                                        <img class="card-img" src="assets/images/coffee1.jpg" alt="Card image">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card border-0 rounded">
                                        <img class="card-img" src="assets/images/coffee1.jpg" alt="Card image">
                                    </div>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="assets/images/coffee-cup.png" style="width:100%; height:100% ;object-fit:cover;" alt="">
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>