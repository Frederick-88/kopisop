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
    <link rel="stylesheet" href="../styles/navbar.css?">

    <link rel="stylesheet" href="../styles/menu.css">
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="bg-menu p-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
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
                        </div>
                    </div>
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
                        </div>
                    </div>
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