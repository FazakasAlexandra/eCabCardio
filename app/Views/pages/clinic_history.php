<div class="patients-page-container history">
    <div class="clinic-table-wraper history">
        <?php echo view('/clinic_history_templates/error_alert.php'); ?>
        <?php echo view('/clinic_history_templates/searchbar.php'); ?>
        <?php echo view('/clinic_history_templates/alert.php'); ?>
        <?php echo view('/clinic_history_templates/table.php'); ?>
        <?php if ($pager) : ?>
            <?php $pager->setPath('/ecabcardio/public/history'); ?>
            <?= $pager->links(); ?>
        <?php endif; ?>
    </div>
</div>
<?php echo view('/templates/consult_bill.php'); ?>
<script type="module" src="/ecabcardio/public/javascript/clinic_history.js"></script>