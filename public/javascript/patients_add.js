import {cancelButtonEvent , selectCitiesChangeEvent, fillSelectInputs, hideForm ,showForm} from './utilities.js'

let addForm = document.querySelector('.add-form')

function addPatientButtonEvent(){
    document.querySelector('.add-patient-button').addEventListener('click', ()=>{
        selectCitiesChangeEvent(addForm)
        fillSelectInputs(1, addForm)
        hideForm(document.querySelector('.edit-form'))
        showForm(addForm)
    })
}

function savePatientEvent(){
    addForm.querySelector('.save-button').addEventListener('click', ()=>{
        console.log('collect values and post patient')
    })
}
addPatientButtonEvent();
cancelButtonEvent(addForm)
savePatientEvent()