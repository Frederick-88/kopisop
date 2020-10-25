<nav class="navbar navbar-expand-lg bg-white sticky-top" role="navigation">
    <a class="navbar-brand" href="index.php"><span>kopisop</span></a>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
                <a class="nav-link" href="../view/menu.php">Menu<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/inbox.php">Inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/cart.php">Cart</a>
            </li>

            <?php if (isset($_SESSION['login'])) { ?>
                

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./account.php" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" id="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">History</a>
                        <a class="dropdown-item" href="../view/feedback.php">Feedback</a>
                        <a type="button"class="dropdown-item" data-toggle="modal" data-target="#modalLogOut">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../view/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/logout.php">Register</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<?php include '../component/modal_logout.php'?>