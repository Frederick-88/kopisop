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
    <link rel="stylesheet" href="../assets/styles/navbar.css">

    <link rel="stylesheet" href="../assets/styles/feedback.css">
    <title>Feedback</title>
</head>

<body>
    <?php include '../component/navbar.php'; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <p style="font-size: 48px;">
                Send Us <span class="m-0 p-0 text-warning">Feedback!</span>
            </p>
            <p>
                Should you face any issue, feel free to leave a feedback.
                <br>
                We will get back to you as soon as we can.
            </p>

            <div class="card mt-5 mx-auto">
                <div class="card-body">
                    <form action="../controller/Feedback_Controller.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
                        <div class="form-group">
                            <label for="messageInput">Message</label>
                            <textarea class="form-control" name="messageInput" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-custom" name="feedback">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>