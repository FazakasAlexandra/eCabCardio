import { db } from './db.js'

function billClickEvent() {
    document.querySelectorAll('.bill').forEach(bill => {
        bill.addEventListener('click', (e) => {
            db.consults.fetchMedicalLetter(e.target.id).then(letter => {
                console.log(letter)
                toggleModal("block")
                const modalBody = document.querySelector('.modal-body')
                modalBody.innerHTML = consultBill(letter)
            })
        })
    })
}

function toggleModal(mode) {
    document.getElementById("myModal").style.display = mode;
}

function consultBill(letter) {
    return `<ul class="field-list">
                ${consultListItems(letter.examinations)}
              </ul>
              <span class="price">Total : ${letter.consult_price} lei</span>`
}

function consultListItems(examinations) {
    return examinations.reduce((acc, exam) => {
        return `${acc}<li>${exam.name} ... ${exam.price} lei</li>`
    }, '')
}

billClickEvent()