<!-- RECEIPT LINE TABLE  -->
<div class="wrapper receipt-line">
    <div>
        <span>Receipt series </span><b><?php echo $receipt->receipt_line[0]['receipt_series'] ?></b>
        <span>Receipt number </span><b><?php echo $receipt->receipt_line[0]['receipt_number'] ?></b>
        <span>VAT percentage </span><b><?php echo $receipt->receipt_line[0]['vat_percentage'] ?> % </b>
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
    <div>
        <span>Total before VAT </span><b><?php echo $receipt->total_before_vat ?> lei</b>
        <span>Total VAT </span><b><?php echo $receipt->total_vat ?> lei</b>
        <span>Total after VAT </span><b><?php echo $receipt->total_after_vat ?> lei</b>
    </div>
</div>