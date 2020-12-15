<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;

include '../vendor/autoload.php';

require '../model/Auth_Model.php';
require '../model/Cart_Model.php';
require '../model/Orders_Model.php';

$dotenv = new Dotenv();
$dotenv->load('../.env');

$auth = new Auth();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $_ENV['EMAIL_PHPMAILER'];
$mail->Password = $_ENV['PASSWORD_PHPMAILER'];
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->setFrom($_ENV['EMAIL_PHPMAILER'], 'Kopisop Official');

$message = file_get_contents('../view/email/Layout_checkout.php');

$cart = new Cart;
$orders = new Orders;

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    $deleteCartById = $cart->deleteCartById($id);

    if ($deleteCartById) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success delete";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed delete";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/cart.php');
}

if (isset($_POST['updateQty'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $updateQty = $cart->updateQtyById($id, $quantity);

    if ($updateQty) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success update quantity of food";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed delete quantity of food";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/cart.php');
}

if (isset($_GET['deleteAll'])) {
    $id = $_GET['deleteAll'];

    $deleteAll = $cart->deleteAllCart($id);

    if ($deleteAll) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Success delete your Cart";
        $_SESSION['type'] = 'alert-success';
    } else {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Failed delete your Cart";
        $_SESSION['type'] = 'alert-danger';
    }

    header('location:../view/menu.php');
}

if (isset($_POST['checkOut'])) {
    $id = $_POST['id'];
    $getData = $auth->getUserById($id);

    $getUser = $getData->fetch_assoc();
    $name = $getUser['name'];
    $email = $getUser['email'];
    $phone = $getUser['phone'];
    $address = $getUser['address'];

    if ($phone == null || $address == null) {
        $_SESSION['notif_menu'] = true;
        $_SESSION['message'] = "Please check your phone number and address at <a href='../view/account.php'>Your Profile</a>";
        $_SESSION['type'] = 'alert-danger';
        header('location:../view/cart.php');
    } else {
        $date = $_POST['date'];
        $tax = $_POST['tax'];
        $shipping = $_POST['shipping'];
        $subtotal = $_POST['subtotal'];
        $total = $_POST['total'];

        $checkOut = $cart->checkOut($id, $date, $tax, $shipping, $subtotal, $total);

        if ($checkOut) {
            $getOrder = $orders->getOrderById($checkOut);
            $getValue = $getOrder->fetch_assoc();

            $message = str_replace('{{name}}', $name, $message);
            $message = str_replace('{{subtotal}}', "Rp " . number_format($getValue['subtotal'], 0, ".", "."), $message);
            $message = str_replace('{{shipping}}', "Rp " . number_format($getValue['shipping'], 0, ".", "."), $message);
            $message = str_replace('{{tax}}', "Rp " . number_format($getValue['tax'], 0, ".", "."), $message);
            $message = str_replace('{{total}}', "Rp " . number_format($getValue['total'], 0, ".", "."), $message);

            $url = 'http://' . $_SERVER['SERVER_NAME'] . '/kopisop/view/index.php';
            $message = str_replace('%link%', $url, $message);

            $getOrderDetail = $orders->getOrderDetailByOrder($checkOut);

            $temp = '<tr>
            <td width="75%" class="purchased">[food] ([qty])</td>
            <td width="25%" class="purchased"> [price] </td>
            </tr>';

            $body="";

            while ($getValueDetail = $getOrderDetail->fetch_array()) {
                $food = $getValueDetail['name'];
                $qty = $getValueDetail['quantity'];
                $price = "Rp " . number_format($getValueDetail['oip'] * $qty, 0, ".", ".");
                $body .= str_replace(array("[food]", "[qty]", "[price]"), array($food, $qty, $price), $temp);
            }

            $message = str_replace("{{detail}}",$body, $message);

            $mail->addAddress($email, $name);
            $mail->isHTML(true);
            $mail->Subject = 'Your Invoice';
            $mail->Body    = $message;

            if (!$mail->send()) {
                $deleteOrder = $orders->deleteOrderById($checkOut);
                $_SESSION['notif_menu'] = true;
                $_SESSION['message'] = "Failed Order. Please Try Again Mailer Error: $mail->ErrorInfo";
                $_SESSION['type'] = 'alert-danger';
            } else {
                $deleteAll = $cart->deleteAllCart($id);
                $_SESSION['notif_menu'] = true;
                $_SESSION['message'] = "Success Order Food. Check on History and your email";
                $_SESSION['type'] = 'alert-success';
            }
        } else {
            $_SESSION['notif_menu'] = true;
            $_SESSION['message'] = "Failed Order. Please Try Again";
            $_SESSION['type'] = 'alert-danger';
        }

        header('location:../view/menu.php');
    }
}
