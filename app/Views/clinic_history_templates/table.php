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

        <!-- VIEW BILL BUTTON -->
        <td><button class="button-blue bill" id=<?php echo $clinicHistory['consult_id']?>>Bill</button></td>
    </tr>
    

<?php endforeach; ?>

</table>