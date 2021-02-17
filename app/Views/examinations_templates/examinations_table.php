<!-- EXAMINATIONS DATA TABLE -->

<table class="exam-table">
   <thead>
      <tr>
         <th scope="col">Examination</th>
         <th scope="col">Price</th>
         <th scope="col"><button class="add-examination-button-top right" onclick="changeForm()">
            <span><i class="fas fa-plus"></i></span>
            <span>ADD NEW</span></button>
         </th>
      </tr>
   </thead>
   <tbody>

      <?php     
         for($i = 0; $i<count($data); $i++): ?>
      <tr>
         <td scope="col"><?= $data[$i]['examination']?></td>
         <td scope="col"><?= $data[$i]['price']?></td>



         <td scope="col">
            <button class="right" id="table-button-<?= $i?>" type="button" onclick="populateForm(<?= $i?>)" data-id="<?=$data[$i]['id']?>" data-exam="<?=$data[$i]['examination']?>" data-price="<?=$data[$i]['price']?>">Modify</button>
         </td>



      </tr>
      <?php endfor;?>

   </tbody>
</table>
