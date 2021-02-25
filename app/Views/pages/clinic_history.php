<div class="patients-page-container history">
    <div class="clinic-table-wraper history">
        <?php echo view('/clinic_history_templates/searchbar.php'); ?>
        <?php echo view('/clinic_history_templates/alert.php'); ?>
        <?php echo view('/clinic_history_templates/table.php'); ?>
    </div>
</div>
<?php echo view('/templates/consult_bill.php'); ?>
<script type="module" src="/ecabcardio/public/javascript/clinic_history.js"></script>