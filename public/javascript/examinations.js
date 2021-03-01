function populateForm(i) {

    if (document.getElementById("form-update").style.display = 'none') {
        document.getElementById("form-update").style.display = 'block';
        document.getElementById("form-add").style.display = 'none';
    }

    const data = document.querySelector(`#table-button-${i}`);

    document.getElementById("id").value = data.dataset.id;
    document.getElementById("name-examination").value = data.dataset.exam;
    document.getElementById("price").value = data.dataset.price;

    const id = data.dataset.id;
    const examination = data.dataset.exam;
    const price = data.dataset.price;

    document.getElementById("dltbutton").href = `http://localhost/ecabcardio/public/admin/dltexam/${id}`

}


function clearCells() {
  
    document.getElementById("id").value = "";
    document.getElementById("name-examination").value = "";
    document.getElementById("price").value = "";
}

function changeForm() {
       
    if (document.getElementById("form-add").style.display ='none') { 
        document.getElementById("form-add").style.display = 'block';
        document.getElementById("form-update").style.display = 'none';
    } 
}

function closeForm(i) {

    if (i == "update") {
        document.getElementById("form-update").style.display = 'none'
    }else if (i == "add") {
        document.getElementById("form-add").style.display = 'none'
    }

}