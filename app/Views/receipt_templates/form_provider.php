<div class="receipt-field provider">
    <h1>Provider</h1>
    <div class="alert alert-primary"><i class="fas fa-info"></i>If changes are neccessary, contact your administrator  </div>
    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <p>Clinic name</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->clinic_name ?>">
        </div>
        <div class="inner-wrapper">
            <p>Phone</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->phone ?>">
        </div>
    </div>
    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <p>Fiscal number</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->fiscal_number ?>">
        </div>
        <div class="inner-wrapper">
            <p>ORC number</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->orc_number ?>">
        </div>
    </div>
    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <p>Fax</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->fax ?>">
        </div>
        <div class="inner-wrapper">
            <p>Email</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->email ?>">
        </div>
    </div>
    <div class="outer-wrapper">
    <div class="inner-wrapper bank_account">
            <p>Bank account</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->bank_account ?>">
        </div>
        <div class="inner-wrapper bank">
            <p>Bank</p>
            <input disabled class="form-control" value="<?php echo $receipt->clinic->bank ?>">
        </div>
    </div>
</div>