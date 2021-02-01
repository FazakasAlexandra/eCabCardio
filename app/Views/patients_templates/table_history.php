<!-- PATIENT HISTORY TABLE  -->
<table style="width:100%" class="history-table">
    <tr>
        <th colspan="6"><?php echo $patientHistory['name'] ?>'s history</th>
    </tr>

    <tr>
        <th>Hour</th>
        <th>Date</th>
        <th>Doctor</th>
        <th colspan="3" style="text-align:left">Total</th>

        <!-- FILL TABLE WITH PATIENT HISTORY DATA  -->
        <?php foreach ($patientHistory['data'] as $history) : ?>

    <tr>
        <td><?php echo $history['hour'] ?></td>
        <td><?php echo $history['date'] ?></td>
        <td><?php echo $history['doctor'] ?></td>
        <td><?php echo $history['total'] ?> lei</td>

        <!-- VIEW MEDICAL LETTER BUTTON -->
        <td><i class="far fa-file-alt" id=<?php echo $history['consult_id'] ?>></i></td>

        <!-- VIEW CONSULT BUTTON-->
        <td id="history-arrow"><i class="fas fa-chevron-left" id=<?php echo $history['consult_id'] ?>></i></td>
    </tr>

<?php endforeach; ?>

</table>