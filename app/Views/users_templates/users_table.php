<!-- USERS DATA TABLE -->

<table class="admin-modifications-table">
   <thead>
      <tr>
         <th>Name of the user</th>
         <th><a href="http://localhost/ecabcardio/public/UsersLogin/register" class="button-blue">
               <span><i class="fas fa-plus"></i></span>
               <span>Add new</span>
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      <?php
      for ($i = 0; $i < count($data); $i++) : ?>
         <tr>
            <td><?= $data[$i]['name_surname'] ?></td>
            <td class="user-table-row">
               <form method="post" action="http://localhost/ecabcardio/public/admin/updaterole/<?=$data[$i]['id']?>" class="form-update-user">
                  <div class="form-check form-switch">
                     <input class="form-check-input input-<?=$data[$i]['is_admin']?>" name="input-<?=$data[$i]['id']?>" type="checkbox" id="flexSwitchCheckChecked">
                     <label class="form-check-label user-admin" for="flexSwitchCheckChecked"><?php if($data[$i]['is_admin'] == 1) echo "Admin";?></label>
                  </div>
                  <div>
                  <button type="submit" class="right button-blue">
                     <i class="fas fa-pen"></i>
                     Save role
                  </button>
               </div>
               </form>
               <a href="http://localhost/ecabcardio/public/admin/dltuser/<?=$data[$i]['id']?>" type="button" class="btn btn-delete-entry">
                  Delete
               </a>
            </td>
         </tr>
      <?php endfor; ?>
   </tbody>
</table>