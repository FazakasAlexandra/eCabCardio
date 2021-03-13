import {removeKeys} from './utilities.js'
import { db } from './db.js'

function medicalLetterHTML(letter, consultPrice){
    return Object.keys(letter).reduce((acc, key, idx) => {
        if (key === 'analysis') return acc + consultFieldList(key, letter, idx)

        if(key === 'examinations') return acc + consultBill(key, letter, idx, consultPrice)

        return acc + consultField(key, letter, idx)
    }, '')
}

function consultFieldList(key, consult, idx) {
    return `<div class="field-container field-${idx}">
              <p class="field-name">${key}</p>
              <ul class="field-list">
                ${consultListItems(key, consult)}
              </ul>
            </div>`
}

function consultField(key, consult, idx) {
    return `<div class="field-container field-${idx}">
              <p class="field-name">${key.replace(/_/g, ' ')}</p> 
              <p class="field-content">${consult[key]}<p>
            </div>`
}

function consultBill(key, letter, idx, consultPrice){
    return `<div class="field-container field-${idx}">
              <p class="field-name">Consult Bill</p>
              <ul class="field-list">
                ${consultListItems(key, letter)}
              </ul>
              <span class="price">Total : ${consultPrice} lei</span>
            </div>`
}

function consultListItems(key, consult) {
    return consult[key].reduce((acc, listItem) => {
        return `${acc}<li>${listItem.name} ... ${listItem.price} lei</li>`
    }, '')
}

/* FILE ICON CLICK EVENT */
function fileClickEvent() {
    document.querySelectorAll('.fa-file-alt').forEach(file => {
        file.addEventListener('click', (e) => {
            document.querySelector('#pdf-button').href += e.target.id
            db.consults.fetchMedicalLetter(e.target.id).then(letterContent => {
                console.log(letterContent)
                toggleModal("block")
                fillModalBody(letterContent)
            })
        })
    })
}


function toggleModal(mode){
    document.getElementById("myModal").style.display = mode;
}

function fillModalBody(letterContent){
    const modalBody = document.querySelector('.modal-body')
    modalBody.innerHTML = `<p class="info">${letterContent.letter_info}</p><p class="info">${letterContent.patient_info}</p>`

    const consultPrice = letterContent.consult_price
    const consultDate = letterContent.date

    removeKeys(['consult_id', 'consult_price', 'patient_info', 'letter_info', 'date'], letterContent)

    modalBody.innerHTML += medicalLetterHTML(letterContent, consultPrice);

    document.querySelector('.modal-footer').innerHTML = `<p>Signature<p><p>Date : ${consultDate}</p>`
    
}

/* MODAL CLOSE BUTTON CLICK EVENT */
document.querySelector('.close').addEventListener('click', () => {
    toggleModal("none")
})

fileClickEvent()