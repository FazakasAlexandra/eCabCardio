<div class="patients-page-container">

    <div class="pacients-table-wraper history">
        <?php echo view('/patients_templates/table_history.php'); ?>
    </div>

    <!-- DINAMICALY GENERATED CONSULT CONTENT ON ARROW ICON CLICK -->
    <div><div class="consult-fields-container"></div></div>

    <!-- DINAMICALY GENERATED CONSULT FILE CONTENT ON ARROW IMG ICON CLICK -->
    <?php echo view('/patients_templates/files_history.php'); ?>
</div>

<?php echo view('/templates/medical_letter.php'); ?>

<script type="module" src="/ecabcardio/public/javascript/patient_history.js"></script>

<?php echo view('/templates/footer.php'); ?>
