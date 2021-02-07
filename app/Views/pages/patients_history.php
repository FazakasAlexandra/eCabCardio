<div class="patients-page-container">

    <div class="pacients-table-wraper history">
        <?php echo view('/patients_templates/table_history.php'); ?>
    </div>

    <div>
        <div class="consult-fields-container"></div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/ecabcardio/public/assets/logo.png" alt="logo" class="medical-letter-logo">
                <h2>MEDICAL LETTER</h2>
                <i class="fas fa-print noprint" onclick="window.print()"></i>
                <span class="close noprint">&times;</span>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div>
    </div>

</div>

<script src="/ecabcardio/public/javascript/patient_history.js"></script>
<?php echo view('/templates/footer.php'); ?>