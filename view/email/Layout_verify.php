<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            width: 100%;
        }

        .header {
            padding: 1%;
            background-color: #ca1414;
        }

        .header h1 {
            color: white;
            font-weight: bold;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .img-email {
            width: 1000px;
        }

        .fill {
            text-align: center;
            font-weight: bold;
        }

        .fill h1 {
            color: #ca1414;
            font-size: 56px;
        }

        .fill .button-verify {
            padding: 2%;
            background-color: #ca1414;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 28px;
            border-radius: 10px;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }

            .img-email {
                width: 100%;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1> Kopisop</h1>
    </div>
    <div class="container">
        <img class="img-email" src="cid:image-email" alt="email-verify">
        <div class="fill">
            <h1>Only one step to go</h1>
            <h2> Click the button below and you'll be able to activate your <span style="color: #ca1414;">Kopisop</span> account</h2>
            <br>
            <a href='%link%' class="button-verify">
                Proceed
            </a>
        </div>
    </div>
</body>

</html>