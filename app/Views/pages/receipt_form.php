<link rel="stylesheet" href="/ecabcardio/public/css/receipt.css">

<body>
    <div class="receipt-form">
        <div class="alert alert-success hidden">
            <div>
                <i class="fas fa-check"></i>Receipt was succesfully created !
            </div>
            <a href="/ecabcardio/public/receipts/view/<?php echo $receipt->consult_id ?>" class="button-blue" id="receipt-view-link">View receipt</a>
        </div>
        <div class="provider-buyer-wrapper">
            <?php echo view('/receipt_templates/form_provider.php'); ?>
            <?php echo view('/receipt_templates/form_buyer.php'); ?>
        </div>

        <?php echo view('/receipt_templates/form_receipt_details.php'); ?>
        <?php echo view('/receipt_templates/form_receipt_line_table.php'); ?>
        <button patientId="<?php echo $receipt->patient->id ?>" consultId="<?php echo $receipt->consult_id ?>" class="button-blue create-receipt">Create Receipt</button>
    </div>
</body>

<script type="module" src="/ecabcardio/public/javascript/receipt.js"></script>