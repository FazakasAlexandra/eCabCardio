<!-- RECEIPT LINE TABLE  -->
<div class="wrapper receipt-line">
    <div class="receipt-line-info">
        <b>Receipt series </b><span><?php echo $receipt->receipt_line[0]['receipt_series'] ?></span>
        <b>Receipt number </b><span><?php echo $receipt->receipt_line[0]['receipt_number'] ?></span>
        <b>VAT percentage </b><span><?php echo $receipt->receipt_line[0]['vat_percentage'] ?> % </span>
    </div>
    <table class="history-table">
        <tr>
            <th>Examination name</th>
            <th>Quantity</th>
            <th>Measurement</th>
            <th>Price before VAT</th>
            <th>VAT</th>
            <th>Price after VAT</th>
        </tr>
        <?php foreach ($receipt->receipt_line as $receiptLine) : ?>

            <tr>
                <td><?php echo $receiptLine['examination_name'] ?></td>
                <td><?php echo $receiptLine['quantity'] ?></td>
                <td><?php echo $receiptLine['measurement'] ?></td>
                <td><?php echo $receiptLine['price_before_vat'] ?> lei</td>
                <td><?php echo $receiptLine['vat'] ?> lei</td>
                <td><?php echo $receiptLine['price_with_vat'] ?> lei</td>
            </tr>

        <?php endforeach; ?>
    </table>
    <div class="receipt-line-info">
        <b>Total before VAT </b><span><?php echo $receipt->total_before_vat ?> lei</span>
        <b>Total VAT </b><span><?php echo $receipt->total_vat ?> lei</span>
        <b>Total after VAT </b><span><?php echo $receipt->total_after_vat ?> lei</span>
    </div>
</div>