<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Report</title>
    <style type="text/css">
        @page {
            margin: 0;
        }

        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }


        .header {
            padding: 1%;
            background-color: #ca1414;
        }

        .header h1 {
            color: white;
            font-weight: 500;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            page-break-inside: auto;
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
    <div class="header">
        <h1> Kopisop</h1>
    </div>
    <div style="padding:30px;">
        <h1 style="color: #ca1414; text-align:center">Report</h1>
        {{detail}}
    </div>
</body>

</html>