import {cancelButtonEvent , selectCitiesChangeEvent, fillSelectInputs, hideForm , showForm, collectTextValues} from './utilities.js'

let addForm = document.querySelector('.add-form')

function addPatientButtonEvent(){
    document.querySelector('.add-patient-button').addEventListener('click', ()=>{
        selectCitiesChangeEvent(addForm)
        fillSelectInputs(0, addForm)
        hideForm(document.querySelector('.edit-form'))
        showForm(addForm)
    })
}

addPatientButtonEvent();
cancelButtonEvent(addForm)