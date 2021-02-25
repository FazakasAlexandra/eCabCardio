<!-- CONSULTS TABLE PAGINATION -->
<div class="pagination">

    <!-- PREVIOUS 5 CONSULTS BUTTON -->
    <a href="<?php echo "/ecabcardio/public/history/" .  (string) ($offset - 5)  ?>" class="pagination-direction">

        <?php if ($offset > 0) : ?>
            <i class="fas fa-angle-left"></i>
        <?php endif; ?>

    </a>

    <span class="pagination-info"><?php echo (string) ($offset + 5) . " / " . (string) ($records) ?></span>

    <!-- NEXT 5 CONSULTS BUTTON -->
    <a href="<?php echo "/ecabcardio/public/history/" .  (string) ($offset + 5)  ?>" class="pagination-direction">

        <?php if (!(($offset + 5) === $records)) : ?>
            <i class="fas fa-angle-right"></i>
        <?php endif; ?>

    </a>

</div>
