<?php
session_start();

use Dompdf\Dompdf;

include '../vendor/autoload.php';

require '../model/Auth_Model.php';
require '../model/Orders_Model.php';

$dompdf = new DOMPDF();

$auth = new Auth();
$orders = new Orders;

if (isset($_GET['detailOrder'])) {
    $user = $_SESSION['id'];
    $orderId = $_GET['detailOrder'];

    $layout = file_get_contents("../view/pdf/Print_Order.php");

    $getUser = $auth->getUserById($user);
    $getUserValue = $getUser->fetch_assoc();

    $name = $getUserValue['name'];
    $email = $getUserValue['email'];
    $phone = $getUserValue['phone'];
    $address = $getUserValue['address'];

    $layout = str_replace('{{name}}', $name, $layout);
    $layout = str_replace('{{email}}', $email, $layout);
    $layout = str_replace('{{phone}}', $phone, $layout);
    $layout = str_replace('{{address}}', $address, $layout);

    $getOrder = $orders->getOrderById($orderId);
    $getValue = $getOrder->fetch_assoc();

    $layout = str_replace('{{subtotal}}', "Rp " . number_format($getValue['subtotal'], 0, ".", "."), $layout);
    $layout = str_replace('{{shipping}}', "Rp " . number_format($getValue['shipping'], 0, ".", "."), $layout);
    $layout = str_replace('{{tax}}', "Rp " . number_format($getValue['tax'], 0, ".", "."), $layout);
    $layout = str_replace('{{total}}', "Rp " . number_format($getValue['total'], 0, ".", "."), $layout);

    $getOrderDetail = $orders->getOrderDetailByOrder($orderId);

    $temp = '<tr>
                <td width="75%" class="purchased">[food] ([qty])</td>
                <td width="25%" class="purchased"> [price] </td>
            </tr>';

    $body = "";

    while ($getValueDetail = $getOrderDetail->fetch_array()) {
        $food = $getValueDetail['name'];
        $qty = $getValueDetail['quantity'];
        $price = "Rp " . number_format($getValueDetail['oip'] * $qty, 0, ".", ".");
        $body .= str_replace(array("[food]", "[qty]", "[price]"), array($food, $qty, $price), $temp);
    }

    $layout = str_replace("{{detail}}", $body, $layout);

    $dompdf->loadHtml($layout);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('Invoice_' . $name . '_' . $orderId,array("Attachment" => 0));
}

if (isset($_GET['orderYear'])) {
    $year = $_GET['orderYear'];

    $layout = file_get_contents("../view/pdf/Print_Report.php");

    $getMonthOrder = $orders->getMonthOrder($year);

    $temp = '<h1 style="color:#ca1414">[monthName]</h1>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td width="75%" class="order-summary">Date</td>
                        <td width="25%" class="order-summary"> Total </td>
                    </tr>
                        [detail]
                   <tr>
                       <td class="total" width="75%"> TOTAL </td>
                       <td class="total" width="25%"> [totalSum] </td>
                   </tr>
               </table>';


    $temp2 = '<tr>
                <td width="75%" class="purchased"> [date]</td>
                <td width="25%" class="purchased"> [total] </td>
            </tr>';

    $body = "";
    $body2= "";

    while ($getValueMonth = $getMonthOrder->fetch_array()) {
        $monthName = $getValueMonth['month_name']." ".$year;
        $month=$getValueMonth['month'];
        $totalSum = "Rp " . number_format($getValueMonth['totalSum'], 0, ".", ".");

        $monthDetail=$orders->getOrderByMonth($month);

        while ($getValueDetail=$monthDetail->fetch_array()){
            $date = date('l, jS M Y', strtotime($getValueDetail['date']));
            $total = "Rp " . number_format($getValueDetail['total'], 0, ".", ".");

            $body2 .= str_replace(array("[date]", "[total]"), array($date,$total), $temp2);
        }

        $body .= str_replace(array("[monthName]", "[detail]", "[totalSum]"), array($monthName, $body2, $totalSum), $temp);
    }

    $layout = str_replace("{{detail}}", $body, $layout);

    $dompdf->loadHtml($layout);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('Report Koposip' . $year);
}
