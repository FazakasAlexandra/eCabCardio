function arrowClickEvent() {
    document.querySelectorAll('.fa-chevron-left').forEach(arrow => {
        arrow.addEventListener('click', (e) => {
            fetchConsult(e.target.id)
                .then((consult) => {
                    removeConsultKeys(['id', 'hour', 'date', 'patient_id', 'doctor_id'], consult)
                    renderConsult(consult)
                    toggleArrows(e.target);
                })
        })
    });
}

function removeConsultKeys(keys, consult) {
    keys.forEach(k => delete consult[k]);
}

function renderConsult(consult) {
    const consultFields = Object.keys(consult).reduce((acc, key) => {
        return `${acc}<div class="field-container">
          <p class="field-name">${key.replace(/_/g, ' ')}</p> 
          <p class="field-content">${consult[key]}<p>
        </div>`
    }, '')

    document.querySelector('.consult-fields-container').innerHTML = consultFields
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

arrowClickEvent()