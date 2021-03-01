document.querySelector('.add-patient-button').addEventListener('click', ()=>{
    let editForm = document.querySelector('.edit-form');
    let addForm = document.querySelector('.add-form');
    if(!editForm.classList.contains('hidden')) editForm.classList.add('hidden')
    addForm.classList.remove('hidden')
})