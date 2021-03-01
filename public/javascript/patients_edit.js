import {removeKeys, cancelButtonEvent , selectCitiesChangeEvent, fillSelectInputs, hideForm ,showForm} from './utilities.js'
import {db} from './db.js'

let form = document.querySelector('.edit-form');

function editButtonClickEvent() {
    document.querySelectorAll('.edit-button').forEach(editBttn => {
        editBttn.addEventListener('click', (e) => {
            hideForm(document.querySelector('.add-form'))
            showForm(form)

            let patientId = e.target.getAttribute('patient_id')
            form.querySelector('.save-changes').id = patientId

            db.patients.fetchPatient(patientId).then((patient) => {
                fillPatientForm(patient)
            })
        })
    })
}

function fillPatientForm(patient) {
    fillSelectInputs(patient.city_id, form)
    let married = patient.married
    removeKeys(['id', 'city_id', 'married'], patient)
    fillTextInputs(patient)
    fillRadioInput(married)
}

function fillTextInputs(patient) {
    Object.keys(patient).forEach(key => {
        let input = form.querySelector(`#${key}`);
        input.value = patient[key]
    })
}

function fillRadioInput(isMarried) {
    form.querySelectorAll('.married').forEach(radio => {
        if (radio.value == isMarried) {
            radio.checked = true
        } else {
            radio.checked = false
        }
    })
}

function saveChangesButtonEvent(){
    form.querySelector('.save-changes').addEventListener('click', (e)=>{
        const updatedPatient = collectTextValues()
        db.patients.updatePatient(e.target.id, updatedPatient).then(mssg => console.log(mssg))
    })
}

function collectTextValues(updatedPatient = {}){
    form.querySelectorAll('input').forEach((input)=>{
        if(input.id === 'county') return
        if(input.type !== 'radio' ) {
            updatedPatient[input.id] = input.value
        } else {
            if(input.checked) updatedPatient.married = input.value
        }
    })

    updatedPatient.city_id = form.querySelector('#city').value

    return updatedPatient
}

editButtonClickEvent()
selectCitiesChangeEvent(form);
cancelButtonEvent(form)
saveChangesButtonEvent()