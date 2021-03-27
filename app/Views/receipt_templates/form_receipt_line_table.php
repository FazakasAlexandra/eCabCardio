<!-- RECEIPT LINE TABLE  -->
<div class="wrapper receipt-line">
    <table>
        <tr>
            <th>Examination name</th>
            <th>Quantity</th>
            <th>Measurement</th>
            <th>Price before VAT</th>
            <th>VAT</th>
            <th>Price after VAT</th>
        </tr>
        <?php foreach ($receipt->receipt_line as $line) : ?>

            <tr>
                <td><?php echo $line['examination_name'] ?></td>
                <td><?php echo $line['quantity'] ?></td>
                <td><?php echo $line['measurement'] ?></td>
                <td><?php echo $line['price_before_vat'] ?> lei</td>
                <td><?php echo $line['vat'] ?> lei</td>
                <td><?php echo $line['price_with_vat'] ?> lei</td>
            </tr>

        <?php endforeach; ?>
    </table>
    <div class="receipt-line-total">
        <span>Total before VAT </span><input class="form-control" disabled style="width:90px" type="text" value="<?php echo $receipt->total_before_vat ?> lei">
        <span>Total VAT </span><input class="form-control" disabled style="width:90px" type="text" value="<?php echo $receipt->total_vat ?> lei">
        <span>Total after VAT </span><input class="form-control" disabled style="width:90px" type="text" value="<?php echo $receipt->total_after_vat ?> lei">
    </div>
</div>