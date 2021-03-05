<?php if (isset($msg)) : ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $msg ?>
        <a class="button-blue" href="/ecabcardio/public/patients/<?php echo $patient_id ?>/consult">Consult</a>
    </div>
<?php endif; ?>

<?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php endif; ?>