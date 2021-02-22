<div class="container">
<!--     <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 style="margin:50px;"><b><?php echo $title; ?></b></h2>
        </div>
    </div> -->

        <?php if($message): ?>
                  <div class="alert alert-primary" role="alert"><?= $message ?></div>
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
