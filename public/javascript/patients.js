// SHOW/HIDE ADVANCED SEARCHBAR
function toggleSearchbar() {
    document.querySelector('#advanced-search-button').addEventListener('click', (e) => {

        e.stopPropagation()

        const advancedSearchbarButton = document.querySelector('#advanced-search-button')
        const advancedSearchbar = document.querySelector('.advanced-searchbar')

        advancedSearchbar.classList.toggle('hidden')

        advancedSearchbarButton.innerHTML = advancedSearchbar.classList.contains('hidden') ? `<i class="fas fa-angle-up"></i>` : `<i class="fas fa-angle-down"></i>`
    })
}

// SET ACTIVE ORDER BUTTON
function setActiveButtonColor() {
    if (window.location.href.indexOf("DESC") > -1) {
        document.querySelector('.desc').classList.add('active-order')
        document.querySelector('.asc').classList.remove('active-order')
    } else {
        document.querySelector('.asc').classList.add('active-order')
        document.querySelector('.desc').classList.remove('active-order')
    }
};

document.querySelectorAll('.edit-button').forEach(editBttn => {
    editBttn.addEventListener('click', (e) => {
        fetchPatient(e.target.getAttribute('patient_id')).then((patient) => {
            console.log(patient)
        })
    })
})


function fetchPatient(patientId) {
    return fetch(`/ecabcardio/public/patients/${patientId}`)
        .then(res => res.json())
        .then(res => res.patient)
}

setActiveButtonColor()
toggleSearchbar()
