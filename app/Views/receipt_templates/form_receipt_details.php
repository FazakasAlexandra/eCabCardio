<hr>
<div class="receipt-details">
    <div class="inner-wrapper">
        <div class="inner-wrapper">
            <p>Series</p>
            <input id="receipt_series" style="width:90px" class="form-control" disabled value="<?php echo $receipt->receipt_series ?>">
        </div>
        <div class="inner-wrapper">
            <p>Number</p>
            <input id="receipt_number" style="width:60px" class="form-control" disabled value="<?php echo $receipt->receipt_number ?>">
        </div>
        <div class="inner-wrapper">
            <p>VAT</p>
            <input style="width:60px" class="form-control" disabled value="<?php echo $receipt->clinic->vat ?>%">
        </div>
    </div>
    <div class="inner-wrapper date">
        <p>Date</p>
        <input type="date" class="form-control" value="<?php date("Y/m/d") ?>" class="form-control">
    </div>
</div>
<hr>