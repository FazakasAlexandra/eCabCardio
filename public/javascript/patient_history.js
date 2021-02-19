import { displayImages, toggleArrows } from './utilities.js'

/* ARROW ICON CLICK EVENT */
function arrowClickEvent() {
    document.querySelectorAll('.fa-chevron-left').forEach(arrow => {
        arrow.addEventListener('click', (e) => {
            fetchConsult(e.target.id)
                .then((consult) => {
                    removeKeys(['id', 'hour', 'date', 'patient_id', 'doctor_id'], consult)
                    document.querySelector('.consult-fields-container').innerHTML = consultHTML(consult)
                    toggleArrows(e.target);
                    if (!document.querySelector('.fa-chevron-right')) {
                        document.querySelector('.consult-fields-container').innerHTML = ''
                    }
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


function consultListItems(key, consult) {
    return consult[key].reduce((acc, listItem) => {
        return `${acc}<li>${listItem.name} ... ${listItem.price} lei</li>`
    }, '')
}

function fetchConsult(consultId) {
    return fetch(`/ecabcardio/public/consults/${consultId}`)
        .then(res => res.json())
        .then(res => res.consult)
}

function fetchConsultImages(consultId) {
    return fetch(`/ecabcardio/public/consults/${consultId}/images`)
        .then(res => res.json())
        .then(res => res.consult_images)
        .then((images) => {
            renderConsultImages(images)
        })
}

function renderConsultImages(images) {
    if (images.length > 0) {
        document.querySelector('.consult-images-container').innerHTML = consultImagesHTML(images)
    } else {
        document.querySelector('.consult-images-container').innerHTML = '<p id="no-images-message">consult has no images</p>'
    }
}

function consultImagesHTML(images) {
    return images.reduce((acc, img) => {
        return `${acc}<div class="consult-image"><img src="../../assets/${img.file_name}"/></div>`
    }, '')
}

/* IMAGES ICON CLICK EVENT */
function imgIconsClickEvent() {
    document.querySelectorAll('.fa-images').forEach(imgIcon => {
        imgIcon.addEventListener('click', () => {
            changeInterface(imgIcon);
            fetchConsultImages(imgIcon.id);
            document.querySelector('#save-images-button').setAttribute('consultId', imgIcon.id)
        })
    })
}

function changeInterface(imgIcon) {
    let currentActive = document.querySelector('.active-imageIcon')
    let wraper = document.querySelector('.consult-images-wraper')
    let imagesContainer = document.querySelector('.consult-images-container')
    document.querySelector("#save-images-button").classList.add('hidden')

    if (!document.querySelector('.alert').classList.contains('hidden')) {
        document.querySelector('.alert').classList.add('hidden')
    }

    // removes active class if it exists on a different img icon than the target
    if (currentActive && imgIcon != currentActive) {
        currentActive.classList.remove('active-imageIcon')
    }

    // remove / add active clas on imgIcon
    imgIcon.classList.toggle('active-imageIcon')

    // displays the wraper that contains the file input and the imgs containter
    if (wraper.classList.contains('hidden')) {
        wraper.classList.remove('hidden');
    }

    // if after toggle no active class is found on img icon, hide the wraper and clear the imgs container
    document.querySelector('#images').value = null
    imagesContainer.innerHTML = ''

    if (!document.querySelector('.active-imageIcon')) {
        wraper.classList.add('hidden');
    }
}

let selectedFiles;

function inputFileChangeEvent() {
    document.querySelector('#images').onchange = (e) => {
        document.querySelector('#save-images-button').classList.remove('hidden');
        document.querySelector('#no-images-message').remove();

        displayImages(document.querySelector('.consult-images-container'))
        selectedFiles = e.target.files
    }
}

function uploadConsultImages(consultId) {
    var formData = new FormData();

    Array.from(selectedFiles).forEach(file => {
        formData.append('images[]', file)
    });
    
    return fetch(`/ecabcardio/public/consults/${consultId}/images`, {
        method: 'POST',
        body: formData
    })
}

function saveImagesButtonEvent() {
    document.querySelector('#save-images-button').addEventListener('click', (e) => {
        e.preventDefault();

        uploadConsultImages(e.target.getAttribute('consultId')).then(()=>{
            document.querySelector('.alert').classList.remove('hidden')
        });
    })
};

arrowClickEvent()
imgIconsClickEvent()
inputFileChangeEvent();
saveImagesButtonEvent();