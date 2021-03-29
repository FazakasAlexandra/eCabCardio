<div class="container">

    <?php if($message): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert"><?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col col-8">
            <?php echo view('/examinations_templates/examinations_table.php'); ?>
        </div>

        <div class="col-4" id="form-update">         
            <?php echo view('/examinations_templates/update_form.php'); ?> 
        </div>

        <div class="col-md-4 col sm-4 " id="form-add">
            <?php echo view('/examinations_templates/add_form.php'); ?> 
         </div>

    </div>
</div>

<script src="/ecabcardio/public/javascript/examinations.js"></script>
<?php echo view('templates/footer.php'); ?>
