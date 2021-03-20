<link rel="stylesheet" href="/ecabcardio/public/css/receipt.css">

<body>
    <div class="receipt-form">
        <div class="provider-buyer-wrapper">
            <?php echo view('/receipt_templates/form_provider.php'); ?>
            <?php echo view('/receipt_templates/form_buyer.php'); ?>
        </div>

        <?php echo view('/receipt_templates/form_receipt_details.php'); ?>
        <?php echo view('/receipt_templates/form_receipt_line_table.php'); ?>
        <button class="button-blue create">Create Receipt</button>
    </div>
</body>

<script type="module" src="/ecabcardio/public/javascript/receipt.js"></script>