<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food Takeaway</title>
    <link rel="stylesheet" href="./styles/style.css" media="all" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php
    include("functions/functions.php");
    ?>

    <!-- Main Container starts here -->
    <div class="main-wrapper">
        <!--  Header starts here-->
        <div class="header-wrapper">
            <img id="logo" src="images/logo.gif" />
            <img id="banner" src="images/banner.gif" />
        </div>
        <!-- Header ends here -->

        <!--  Navigation starts-->
        <div class="menubar">

            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">All Products</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>

            </ul>

            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search a Product" />
                    <input type="submit" name="search" value="Search" />
                </form>
            </div>

        </div>




        <!-- Navigation Bar ends -->

        <!--  Content wrapper starts-->
        <div class="content-wrapper">
            <div id="sidebar">
                <div id="sidebar-title">Categories</div>
                <ul id="categories-list">

                    <?php getCats(); ?>


                </ul>

                <div id="sidebar-title">Brands</div>
                <ul id="categories-list">

                    <?php getBrands(); ?>

                </ul>

            </div>
            <div id="content-area">This is Content Area</div>
        </div>
        <!--  Content wrapper ends -->

        <div id="footer">

            <h2 style="text-align:center; padding-top:30px;">&copy; 2020 Copyright Served by CoffeeSOP. </h2>
        </div>

    </div>
    </div>
    <!-- Main Container ends here -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>