<div class="patients-page-container">

    <div class="pacients-table-wraper">
        <?php echo view('/patients_templates/searchbar_regular.php'); ?>
        <?php echo view('/patients_templates/searchbar_advanced.php'); ?>
        <?php echo view('/patients_templates/table.php'); ?>
        <?php echo view('/patients_templates/pagination.php'); ?>
    </div>
    <div class="patients-form"></div>
</div>

<script src="/ecabcardio/public/javascript/patients.js"></script>
<?php echo view('/templates/footer.php'); ?>
