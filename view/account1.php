<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Personal Information</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/account1.css">
    <link rel="stylesheet" href="../assets/styles/navbar.css">

</head>
<?php include "../component/navbar.php"; ?>
<body oncontextmenu='return false' class='snippet-body'>
    <div class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">Account settings</h4>
        <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
                <p>Accepted file type .png. Less than 1MB</p> <button class="btn button border"><b>Upload</b></button>
            </div>
        </div>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6"> <label for="firstname">First Name</label> <input type="text" class="bg-light form-control" placeholder="User" value="<?php echo $_SESSION['name'] ?>"> </div>
                <div class="col-md-6 pt-md-0 pt-3"> <label for="address">Address</label> <input type="text" class="bg-light form-control" placeholder="Jln."  value="<?php echo empty($_SESSION['address']) ? "-" : $_SESSION['address']; ?>"> </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6"> <label for="email">Email Address</label> <input type="text" class="bg-light form-control" placeholder="user@email.com" value="<?php echo $_SESSION['email'] ?>"> </div>
                <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="tel" class="bg-light form-control" placeholder="+62 " value="<?php echo empty($_SESSION['phone']) ? "-" : $_SESSION['phone']; ?>"> </div>
            </div>
            <div class="row py-2">

            </div>
            <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3">Edit</button> <button class="btn border button">Back</button> </div>
            
        </div>
    </div>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</body>

</html>