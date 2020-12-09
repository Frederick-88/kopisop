<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/navbar.css?v=<?= time() ?>">
</head>

<body>
    <?php include "./model/auth/logout_controller.php"; ?>
    
    <nav class="navbar navbar-expand-lg bg-white position-sticky">
        <a class="navbar-brand" href="index.php"><span>kopisop</span></a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./menu.php">Menu<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/inbox.php">Inbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model/Logout_controller.php">Logout</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./account.php" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" >
                        <a href="#" class="dropdown-item" >Setting</a>
                        <a href="#" class="dropdown-item" >History</a>
                        <a href="#" class="dropdown-item" >Feedback</a>
                        <a href="./model/Logout_controller.php" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</body>

</html>