<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Checkout</title>
    <style type="text/css">
        @page {
            margin: 0px;
        }

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
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="left" style="background-color: #ca1414;">
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding-left: 30px; color:#ffffff">
                                        <h1>Kopisop</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px 35px 20px 35px; background-color: #ffffff;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style=" font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 15px;">
                                        <h1 style="text-align: center; color:#ca1414">Order Detail</h1>
                                        <div style="margin-top: 40px;">
                                            <h3>Name : {{name}}</h3>
                                            <h3>Email : {{email}}</h3>
                                            <h3>Phone : {{phone}}</h3>
                                            <h3>Adresss : {{address}}</h3>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" class="order-summary">Orders</td>
                                                <td width="25%" class="order-summary"> Prices </td>
                                            </tr>
                                            {{detail}}
                                            <tr>
                                                <td width="75%" class="purchased"> Subtotal</td>
                                                <td width="25%" class="purchased"> {{subtotal}} </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" class="shipping-tax"> Shipping</td>
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
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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