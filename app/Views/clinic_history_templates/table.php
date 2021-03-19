<!-- CLINIC HISTORY TABLE  -->
<table style="width:100%" class="history-table">
    <tr>
        <th>Hour</th>
        <th>Date</th>
        <th>Doctor</th>
        <th colspan="4" style="text-align:left">Total</th>

        <!-- FILL TABLE WITH CLINIC HISTORY DATA  -->
        <?php foreach ($data as $clinicHistory) : ?>

    <tr>
        <td><?php echo $clinicHistory['hour'] ?></td>
        <td><?php echo $clinicHistory['date'] ?></td>
        <td><?php echo $clinicHistory['doctor'] ?></td>
        <td><?php echo $clinicHistory['total'] ?> lei</td>

        <!-- VIEW CONSULT BUTTON -->
        <td>
            <a class="button-blue" href="<?php echo "/ecabcardio/public/consults/history/" . (string)$clinicHistory['consult_id'] ?>">View consult</a>
        </td>

        <!-- VIEW RECEIPT BUTTON -->
        <?php if ($clinicHistory['receipt']) : ?>
            <td><a href="/ecabcardio/public/receipts/view/<?php echo $clinicHistory['consult_id']?>" class="button-blue" id=<?php echo $clinicHistory['consult_id'] ?>>View receipt</a></td>
        <?php endif; ?>

        <!-- CREATE RECEIPT BUTTON -->
        <?php if (!$clinicHistory['receipt']) : ?>
            <td><a href="/ecabcardio/public/receipts/create/<?php echo $clinicHistory['consult_id']?>/<?php echo $clinicHistory['patient_id']?>" class="button-blue nofill" id=<?php echo $clinicHistory['consult_id'] ?>>Add receipt</a></td>
        <?php endif; ?>
    </tr>

<?php endforeach; ?>

</table>