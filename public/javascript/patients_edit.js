import {removeKeys} from './utilities.js'
import {db} from './db.js'

let form = document.querySelector('.edit-form');

function editButtonClickEvent() {
    document.querySelectorAll('.edit-button').forEach(editBttn => {
        editBttn.addEventListener('click', (e) => {
            let addForm = document.querySelector('.add-form')
            if(!addForm.classList.contains('hidden')) addForm.classList.add('hidden')

            let patientId = e.target.getAttribute('patient_id')
            form.querySelector('.save-changes').id = patientId

            if(form.classList.contains('hidden')) form.classList.remove('hidden')

            db.patients.fetchPatient(patientId).then((patient) => {
                fillPatientForm(patient)
            })
        })
    })
}

function cancelButtonEvent(){
    form.querySelector('.cancel-edit').addEventListener('click', ()=>form.classList.add('hidden'))
}

function selectCitiesChangeEvent(citiesInput = form.querySelector('#city')) {
    console.log('hahahah')
    citiesInput.addEventListener('change', (e) => {
        let countyInput = form.querySelector('#county')
        let countyId = citiesInput.options[citiesInput.selectedIndex].getAttribute('county_id')

        db.counties.fetchCounty(countyId).then(county => {
            countyInput.value = county.county
            countyInput.setAttribute('county_id', county.id)
        })

    })
}

function fillPatientForm(patient) {
    fillSelectInputs(patient.city_id, patient.county)
    let married = patient.married
    removeKeys(['id', 'city_id', 'married'], patient)
    fillTextInputs(patient)
    fillRadioInput(married)
}

function fillSelectInputs(patientCityId) {
    let citiesSelectInput = form.querySelector('#city')
    db.cities.fetchCities().then((cities) => {
        citiesSelectInput.innerHTML = cities.reduce((acc, city) => {
            if (patientCityId == city.id) return `${acc}<option value=${city.id} county_id=${city.county_id} selected>${city.city}</option>`
            return `${acc}<option value=${city.id} county_id=${city.county_id}>${city.city}</option>`
        }, '')
    })
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
selectCitiesChangeEvent()
cancelButtonEvent()
saveChangesButtonEvent()