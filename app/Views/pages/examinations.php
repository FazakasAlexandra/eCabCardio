<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 style="margin:50px;"><b><?php echo $title; ?></b></h2>
        </div>
    </div>
    <?php if($message): ?>
                  <div class="alert alert-primary" role="alert"><?= $message ?></div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Examination</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php     
            for($i = 0; $i<count($data); $i++): ?>
                    <tr>
                        <td scope="col"><?= $data[$i]['examination']?></td>
                        <td scope="col">
                            <?= $data[$i]['price']?>
                        </td>
                        <td scope="col">
                        <button id="table-button" type="button" onclick="populateForm(value)" value="<?=$data[$i]['id'] . '%' . $data[$i]['examination'] . '%' . $data[$i]['price']?>">Modify</button>
                        </td>
                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 col sm-4">
                <form id="form" method="post" action="http://localhost/ecabcardio/public/admin/updexam">
                      <div class="hidden">
                        <label class="form-label" value="">Nr_crt</label>
                        <input name="idReceived" type="text" class="form-control" id="id">
                    </div>

                    <div>
                        <label for="examination" class="form-label" value="">Name of the Examination</label>
                        <input name="newExam" type="text" class="form-control" id="name-examination">
                    </div>
                    <div>
                        <label for="price" class="form-label">Price</label>
                        <input name="newPrice" type="text" class="form-control" id="price">
                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="" id="dltbutton" type="button" class="btn btn-danger">Delete entry</a>
                     </div>
                </form>  
                 
         </div>
      </div>
</div>

<<<<<<< HEAD
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
=======
<?php echo view('templates/footer.php'); ?>
>>>>>>> 43af1497660041a646f43b57ff0622d55fd67a40
