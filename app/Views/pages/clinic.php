<div class="container">
<div class="exam-form-text">
    <p><i class="fas fa-info"></i>Please make sure data is correct when you make the necessary changes and then click the <b>Save Changes</b> button!</p>
</div>

    <?php if($message): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert"><?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

<!-- enctype="multipart/form-data" necessary for a form with files. If not present, $this->request->getFiles() is empty -->
<form class="clinic-form" method="post" action="http://localhost/ecabcardio/public/admin/updclinic" enctype="multipart/form-data">
    <div class="row clinic-form-row">
        <div class="col form-group clinic-form-col">
            <label for="name">Name</label>
            <input type="text" class="input-clinic" name="name" value="<?= $data->clinic_name ?>">
        </div>
        <div class="col form-group clinic-form-col col-bank">
            <div class="clinic-form-col">
                <label for="bank-account">Bank Account</label>
                <input type="text" class="input-clinic-bank" name="bank-account" value="<?= $data->bank_account ?>">
            </div>
            <div class="clinic-form-col">
                <label for="bank">Bank</label>
                <input type="text" class="input-clinic" name="bank" value="<?= $data->bank ?>" style="width:150px">
            </div>
        </div>
    </div>
    <div class="row clinic-form-row">
        <div class="col form-group clinic-form-col">
            <label for="address">Address</label>
            <input type="text" class="input-clinic" name="address" value="<?= $data->address ?>">
        </div>
        <div class="col form-group clinic-form-col">
            <label for="fiscal-no">Fiscal number</label>
            <input type="text" class="input-clinic" name="fiscal-no" value="<?= $data->fiscal_number ?>">
        </div>
    </div>
    <div class="row clinic-form-row">
        <div class="col form-group clinic-form-col">
            <label for="tel-no">Telephone number</label>
            <input type="text" class="input-clinic" name="tel-no" value="<?= $data->phone ?>">
        </div>
        <div class="col form-group clinic-form-col">
            <label for="orc-no">Orc number</label>
            <input type="text" class="input-clinic" name="orc-no" value="<?= $data->orc_number ?>">
        </div>
    </div>
    <div class="row clinic-form-row">
        <div class="col form-group clinic-form-col">
            <label for="fax-no">Fax number</label>
            <input type="text" class="input-clinic" name="fax-no" value="<?= $data->fax ?>">
        </div>
        <div class="col form-group clinic-form-col">
            <label for="vat-no">VAT number</label>
            <input type="text" class="input-clinic" name="vat-no" value="<?= $data->vat ?>">
        </div>
    </div>
    <div class="row clinic-form-row">
        <div class="col form-group clinic-form-col">
            <label for="logo">Logo</label>
            <div class="logo-clinic">
                <input type="file" class="i" name="logo" style="width:350px">
                <img src="/ecabcardio/public/assets/<?= $data->logo ?>" alt="logo"/>
            </div>
            
        </div>
        <div class="col form-group clinic-form-col">
            <label for="receipt-series">Receipt series</label>
            <input type="text" class="input-clinic" name="receipt-series" value="<?= $data->receipt_series ?>">
        </div>
    </div>
    <div class="row">
        <div>
            <button class="update-examination-button" type="submit" style="float:right; margin:10px;">Save changes</button>
        </div>
    </div>
</form>
<div>

<?php echo view('templates/footer.php'); ?>