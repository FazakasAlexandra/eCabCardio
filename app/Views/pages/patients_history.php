<div class="patients-page-container">

    <div class="pacients-table-wraper history">
        <?php echo view('/patients_templates/table_history.php'); ?>
    </div>

    <div>
        <div class="consult-fields-container"></div>
    </div>

    <div class = "consult-files-wraper hidden">
        <form action="" class="file-upload-form">
            <input type="file" name="files[]" multiple id="files" accept=".png, .jpg, .jpeg, .pdf">
            <button class="button-blue-dark hidden" id="save-files-button">Save Files</button>
        </form>
        <div class="consult-pdf-container"></div>
        <div class="alert alert-success hidden" role="alert">Files successfully saved !</div>
        <div class="consult-images-container"></div>
    </div>
</div>

<?php echo view('/templates/medical_letter.php'); ?>

<script type="module" src="/ecabcardio/public/javascript/patient_history.js"></script>

<?php echo view('/templates/footer.php'); ?>
