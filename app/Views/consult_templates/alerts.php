<?php
if (isset($data['errors'])) :
?>
    <div class="alert alert-danger" role="alert">
        <ul style="list-style: none;">
            <?php foreach ($data['errors'] as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php
endif;
?>


<?php
if (isset($data['success'])) :
?>
    <div class="alert alert-success" role="alert">
        <?php echo $data['success'] ?>
        <i class="far fa-file-alt" id=<?php echo $data['consult_id'] ?>></i>
    </div>
<?php
endif;
?>