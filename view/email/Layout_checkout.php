<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Checkout</title>
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        .header-line {
            padding: 1%;
            background-color: #ca1414;
            height: 10px;

        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .header h1 {
            color: #ca1414;
            font-size: 42px;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .order-summary {
            align-items: left;
            background-color: #eee;
            font-size: 16px;
            font-weight: 800;
            line-height: 24px;
            padding: 10px;
        }

        .shipping-tax {
            align-items: left;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            padding: 5px 10px;
        }

        .purchased {
            align-items: left;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            padding: 15px 10px 5px 10px;
        }

        .total {
            align-items: left;
            font-size: 16px;
            font-weight: 800;
            line-height: 24px;
            padding: 10px;
            border-top: 3px solid #eee;
            border-bottom: 3px solid #eee;

        }
    </style>

</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                        <tr>
                            <td align="center" valign="top" style="font-size:0; padding: 10px;" bgcolor="#ca1414">
                                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                        <tr>
                                            <td align="left" valign="top" style=" font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                                <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">kopisop</h1>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                        <tr>
                                            <td align="right" valign="top" style=" font-size: 48px; font-weight: 400; line-height: 48px;">
                                                <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    <tr>
                                        <td align="center" style=" font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" alt="kopisop" width="125" height="120" style="display: block; border: 0px;" /><br>
                                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td align="left" style="padding-top: 20px;">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td width="75%" class="order-summary">Order Summary</td>
                                                    <td width="25%" class="order-summary"> Prices </td>
                                                </tr>
                                                {{detail}}
                                                <tr>
                                                    <td width="75%" class="purchased"> Subtotal </td>
                                                    <td width="25%" class="purchased"> {{subtotal}} </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" class="shipping-tax"> Shipping  </td>
                                                    <td width="25%" class="shipping-tax"> {{shipping}} </td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" class="shipping-tax"> Sales Tax </td>
                                                    <td width="25%" class="shipping-tax"> {{tax}} </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-top: 20px;">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tr>
                                                    <td class="total" width="75%"> TOTAL </td>
                                                    <td class="total" width="25%"> {{total}} </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                    <tr>
                                        <td align="center" valign="top" style="font-size:0;">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    <tr>
                                        <td align="center" style=" font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                            <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;"> Craving more? Purchase again. </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding: 25px 0 15px 0;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"> <a href="#" target="_blank" style="font-size: 18px;  color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;">Shop Again</a> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    Copyright &copy; by kopisop. All right served 2020
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
</body>

</html>