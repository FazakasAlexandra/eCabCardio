<div class="patients-page-container">

    <div class="pacients-table-wraper">
        <?php if (isset($msg)) : ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $msg ?>
                <a href="/ecabcardio/public/patients/<?php echo $patient_id?>/consult">consult</a>
            </div>
        <?php endif; ?>

        <?php echo view('/patients_templates/searchbar_regular.php'); ?>
        <?php echo view('/patients_templates/searchbar_advanced.php'); ?>
        <?php echo view('/patients_templates/table.php'); ?>
        <?php echo view('/patients_templates/pagination.php'); ?>
    </div>
    <?php echo view('/patients_templates/form_add.php'); ?>
    <?php echo view('/patients_templates/form_edit.php'); ?>
</div>

<script type="module" src="/ecabcardio/public/javascript/patients.js"></script>
<?php echo view('/templates/footer.php'); ?>