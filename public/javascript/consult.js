import {displayFiles, toggleArrows} from './utilities.js'

function arrowClickEvent() {
    document.querySelector('.fa-chevron-left').addEventListener('click', (e)=>{
        toggleArrows(e.target)
        document.querySelector('.patient-fields-container').classList.toggle('hidden');
    })
}

function inputFileChangeEvent(){
    document.querySelector('#files').onchange = ()=>{
        let imgsContainer = document.querySelector('.consult-images-container')
        imgsContainer.innerHTML = '';
        displayFiles(imgsContainer, imgsContainer)
    }
}

arrowClickEvent();
inputFileChangeEvent();