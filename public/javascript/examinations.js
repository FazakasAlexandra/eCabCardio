

function populateForm(value) {
    i = value.split('%');
    [id, examination, price] = i;
    document.getElementById("id").value = id;
    document.getElementById("name-examination").value = examination;
    document.getElementById("price").value = price;
    document.getElementById("dltbutton").href = `http://localhost/ecabcardio/public/admin/dltexam/${id}`

}

/*const searchBox = document.getElementById("searchbox");
searchBox.addEventListener('click', function () {
    let answer;
    if (confirm("Are you sure you want to delete the entry?")) {
        answer = true;
    } else {
        answer = false;
    }
}
}*/