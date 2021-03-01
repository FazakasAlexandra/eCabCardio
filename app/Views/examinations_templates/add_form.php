<!-- ADD EXAMINATIONS FORM -->

<div class="form-wrap" >
   <div class="header-form">
      <button class="button-close" onclick="closeForm('add')">X</button>
   </div>
   <div class="form-body">
      <div class="exam-form-text">
         <div>
            <p><i class="fas fa-info"></i>Fill in the form and press the <b>Add New Examination</b> button</p>
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
            <button type="submit" class="btn btn-save-changes">Add New Examination</button>
         </div>
      </form>
   </div>
</div>      
