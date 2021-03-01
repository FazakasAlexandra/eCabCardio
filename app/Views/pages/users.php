
<div class="container">

        <?php if($message): ?>
                  <div class="alert alert-primary" role="alert"><?= $message ?></div>
        <?php endif; ?>


    <div class="row">
        <div class="col col-12">
        <?php echo view('/users_templates/users_table.php'); ?>
        </div>

        
    </div>
</div>
<script src="/ecabcardio/public/javascript/users.js"></script>
<?php echo view('templates/footer.php'); ?>