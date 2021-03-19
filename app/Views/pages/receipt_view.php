<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt PDF</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans");

        body {
            font-family: "Nunito Sans", sans-serif;

        }

        h1,
        h4 {
            margin-top: -20px;
            border-bottom: solid;
            border-width: thin;
        }

        img{
            margin-bottom: 0px;
        }

        h1 {
            border-top: 0px;
        }

        .wrapper.row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper.receipt-line{
            margin-top: -100px;
        }

        .wrapper.receipt-line b {
            margin-right: 20px;
            background-color: #f2f2f2;
            padding: 0.5rem
        }

        .receipt_field.buyer{
            margin-left: 53%;
        }

        .receipt_field.header p:first-child {
            margin-top: 0px;
        }

        .receipt_field.header {
            margin: 0px;
            margin-left: 70%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 1rem 0rem 1rem 0rem;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #57B0F1;
            color: white;
        }

        input {
            width: fit-content;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <?php echo view('/receipt_templates/receipt_header.php'); ?>

        <div class="wrapper row">
            <?php echo view('/receipt_templates/provider.php'); ?>

            <?php if ($receipt->company_buyer) : ?>
                <?php echo view('/receipt_templates/company_buyer.php'); ?>
            <?php endif ?>

            <?php if (!$receipt->company_buyer) : ?>
                <?php echo view('/receipt_templates/patient_buyer.php'); ?>
            <?php endif ?>
        </div>

        <?php echo view('/receipt_templates/receipt_line_table.php'); ?>

    </div>

</body>

</html>