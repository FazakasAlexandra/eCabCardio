/* ARROW ICON CLICK EVENT */
function arrowClickEvent() {
    document.querySelectorAll('.fa-chevron-left').forEach(arrow => {
        arrow.addEventListener('click', (e) => {
            fetchConsult(e.target.id)
                .then((consult) => {
                    console.log(consult)
                    removeKeys(['id', 'hour', 'date', 'patient_id', 'doctor_id'], consult)
                    document.querySelector('.consult-fields-container').innerHTML = consultHTML(consult)
                    toggleArrows(e.target);
                })
        })
    });
}

function removeKeys(keys, object) {
    keys.forEach(k => delete object[k]);
}

function consultHTML(consult) {
    return Object.keys(consult).reduce((acc, key, idx) => {
        if (key === 'examinations' || key === 'analysis') return acc + consultFieldList(key, consult, idx)

        return acc + consultField(key, consult, idx)
    }, '')
}

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

function toggleArrows(arrow) {
    if (document.querySelector('.fa-chevron-right') && document.querySelector('.fa-chevron-right') !== arrow) {
        document.querySelector('.fa-chevron-right').classList.remove('fa-chevron-right', 'active-arrow')
    }
    arrow.classList.toggle('fa-chevron-right')
    arrow.classList.toggle('active-arrow')

    if (!document.querySelector('.fa-chevron-right')) {
        document.querySelector('.consult-fields-container').innerHTML = ''
    }
}

function fetchConsult(consultId) {
    return fetch(`/ecabcardio/public/consults/${consultId}`)
        .then(res => res.json())
        .then(res => res.consult)
}

/* FILE ICON CLICK EVENT */
function fileClickEvent() {
    document.querySelectorAll('.fa-file-alt').forEach(file => {
        file.addEventListener('click', (e) => {
            fetchMedicalLetter(e.target.id).then(letterContent => {
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

    removeKeys(['consult_id', 'consult_price', 'patient_info', 'letter_info'], letterContent)

    modalBody.innerHTML += medicalLetterHTML(letterContent, consultPrice);

    letterContent.date = '02-04-2020'

    document.querySelector('.modal-footer').innerHTML = `<p>Signature<p><p>Date : 02-04-2020</p>`
    
}

function fetchMedicalLetter(consultId) {
    return fetch(`/ecabcardio/public/consults/${consultId}/letter`)
        .then(res => res.json())
        .then(res => res.medical_letter)
}

/* MODAL CLOSE BUTTON CLICK EVENT */
document.querySelector('.close').addEventListener('click', () => {
    toggleModal("none")
})

arrowClickEvent()
fileClickEvent()