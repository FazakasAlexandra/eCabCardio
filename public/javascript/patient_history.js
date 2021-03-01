import { removeKeys, shortenFileName, displayFiles, toggleArrows } from './utilities.js'
import { db } from './db.js'

/* ARROW ICON CLICK EVENT */
function arrowClickEvent() {
    document.querySelectorAll('.fa-chevron-left').forEach(arrow => {
        arrow.addEventListener('click', (e) => {
            db.consults.fetchConsult(e.target.id)
                .then((consult) => {
                    console.log(consult)
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

function filterFiles(files, fileTypes = { img: [], pdf: [] }) {
    files.forEach(file => {
        if (file.file_name.includes('.pdf')) {
            fileTypes.pdf.push(file)
        } else {
            fileTypes.img.push(file)
        }
    })

    return fileTypes
}

function renderConsultFiles(files) {
    let fileTypes = filterFiles(files)

    if (fileTypes.img.length === 0 && fileTypes.pdf.length === 0) {
        document.querySelector('.consult-images-container').innerHTML = '<p id="no-files-message">consult has no files</p>'
        return
    }

    if (fileTypes.img.length > 0) document.querySelector('.consult-images-container').innerHTML = consultImagesHTML(fileTypes.img)

    if (fileTypes.pdf.length > 0) document.querySelector('.consult-pdf-container').innerHTML = consultPdfHTML(fileTypes.pdf)

}

function consultImagesHTML(imgFiles) {
    return imgFiles.reduce((acc, img) => {
        return `${acc}<div class="consult-image"><img src="../../assets/${img.file_name}"/></div>`
    }, '')
}

function consultPdfHTML(pdfFiles) {
    return pdfFiles.reduce((acc, pdf) => {
        return `${acc}<div class="pdf-wraper"><a href="../../assets/${pdf.file_name}">
                        <i class="far fa-file-alt"></i></a>
                        <span>${shortenFileName(pdf.file_name)}</span>
                      </div>`
    }, '')
}

/* IMAGES ICON CLICK EVENT */
function imgIconsClickEvent() {
    document.querySelectorAll('.fa-images').forEach(imgIcon => {
        imgIcon.addEventListener('click', () => {
            changeInterface(imgIcon);

            db.consults.fetchConsultImages(imgIcon.id).then((files) => {
                renderConsultFiles(files)
            })

            document.querySelector('#save-files-button').setAttribute('consultId', imgIcon.id)
        })
    })
}

function changeInterface(imgIcon) {
    let currentActive = document.querySelector('.active-imageIcon')
    let wraper = document.querySelector('.consult-files-wraper')
    let imagesContainer = document.querySelector('.consult-images-container')
    document.querySelector("#save-files-button").classList.add('hidden')

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
    document.querySelector('#files').value = null
    imagesContainer.innerHTML = ''
    document.querySelector('.consult-pdf-container').innerHTML = ''

    if (!document.querySelector('.active-imageIcon')) {
        wraper.classList.add('hidden');
    }
}

let selectedFiles = '';

/* FILE INPUT ONCHANGE EVENT */
function inputFileChangeEvent() {
    document.querySelector('#files').onchange = (e) => {
        document.querySelector('#save-files-button').classList.remove('hidden');
        if (document.querySelector('#no-files-message')) document.querySelector('#no-files-message').innerHTML = ''

        displayFiles(document.querySelector('.consult-images-container'), document.querySelector('.consult-pdf-container'))
        selectedFiles = !selectedFiles ? [...selectedFiles, ...e.target.files] : e.target.files
    }
}

/* SAVE FILES BUTTON CLICK EVENT */
function saveFilesButtonEvent() {
    document.querySelector('#save-files-button').addEventListener('click', (e) => {
        e.preventDefault();

        var formData = new FormData();

        Array.from(selectedFiles).forEach(file => {
            formData.append('files[]', file)
        });

        db.consults.uploadFiles(e.target.getAttribute('consultId'), formData).then(() => {
            document.querySelector('.alert').classList.remove('hidden')
        });
    })
};

arrowClickEvent()
imgIconsClickEvent()
inputFileChangeEvent();
saveFilesButtonEvent();