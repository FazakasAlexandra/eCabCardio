
<div class="container">

    <?php if($message): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert"><?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col col-12">
        <?php echo view('/users_templates/users_table.php'); ?>
        </div>

        
    </div>
</div>
<script src="/ecabcardio/public/javascript/users.js"></script>
<?php echo view('templates/footer.php'); ?>