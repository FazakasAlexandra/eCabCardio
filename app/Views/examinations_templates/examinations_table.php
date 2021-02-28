<!-- EXAMINATIONS DATA TABLE -->

<table class="admin-modifications-table">
   <thead>
      <tr>
         <th>Examination</th>
         <th>Price</th>
         <th>
            <button class="button-blue" onclick="changeForm()">
               <span><i class="fas fa-plus"></i></span>
               <span>Add new</span>
            </button>
         </th>
      </tr>
   </thead>
   <tbody>
      <?php
      for ($i = 0; $i < count($data); $i++) : ?>
         <tr>
            <td><?= $data[$i]['examination'] ?></td>
            <td><?= $data[$i]['price'] ?></td>
            <td>
               <button class="right button-blue" id="table-button-<?= $i ?>" type="button" onclick="populateForm(<?= $i ?>)" data-id="<?= $data[$i]['id'] ?>" data-exam="<?= $data[$i]['examination'] ?>" data-price="<?= $data[$i]['price'] ?>">
               <i class="fas fa-pen"></i>
                Modify
               </button>
            </td>
         </tr>
      <?php endfor; ?>
   </tbody>
</table>