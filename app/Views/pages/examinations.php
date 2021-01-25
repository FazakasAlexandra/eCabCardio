
<div class="container">
   <div class="row">
      <div class="col-md-6 offset-md-3">
         <h2 style="margin:50px;"><b><?php echo $title; ?></b></h2>
         <h3>Select an examination from the table:</h3>
      </div>
   </div>

   <div class="row">
         <table class="table table-sm">
            <thead>
               <tr>
                  <th scope="col">Examination</th>
                  <th scope="col">Price</th>
               </tr>
            </thead>
            <tbody>
            <?php     
            for($i = 0; $i<count($data); $i++){
               //echo "<tr><br><td><br><a href='http://localhost/ecabcardio/public/admin/examinations/".$data[$i]['examination']."' role='button'>";
               echo "<tr><br><td><br><a href='#' role='button'>";
               echo($data[$i]['examination']);
               echo "</a></button></td><br><td>";
               echo($data[$i]['price']);
               echo "</td><br></tr>";
               }?>
            </tbody>
         </table>
   </div>   
</div>