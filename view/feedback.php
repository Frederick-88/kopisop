<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet" href="../styles/feedback.css">
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
                    <form action="" method="POST">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>