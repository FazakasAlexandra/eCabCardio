import {displayImages, toggleArrows} from './utilities.js'

function arrowClickEvent() {
    document.querySelector('.fa-chevron-left').addEventListener('click', (e)=>{
        toggleArrows(e.target)
        document.querySelector('.patient-fields-container').classList.toggle('hidden');
    })
}

function inputFileChangeEvent(){
    document.querySelector('#images').onchange = ()=>{
        displayImages(document.querySelector('.consult-images-container'))
    }
}

arrowClickEvent();
inputFileChangeEvent();