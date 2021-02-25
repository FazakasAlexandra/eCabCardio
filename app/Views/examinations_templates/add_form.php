<!-- ADD EXAMINATIONS FORM -->

<div class="form-wrap">
   <div class="exam-form-text">
   <i class="fas fa-info"></i>
      <div>
         <p>Fill in the form and press the <b>Add New Examination</b> button</p>
      </div>
      <div>
         <button class="btn-empty-cells button-blue-dark" type="button" onclick="clearCells()">CLEAR</button>
      </div>
   </div>
<form id="form" method="post" action="http://localhost/ecabcardio/public/admin/addexam">
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
   <div class="buttons-examinations">
      <button type="submit" class="btn btn-save-changes button-blue">Add New Examination</button>
   </div>
</form>
</div>      
