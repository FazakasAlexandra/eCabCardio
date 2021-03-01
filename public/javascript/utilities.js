export function displayFiles(imagesContainer, pdfContainer) {
    const imagesInput = document.querySelector('#files').files
    let imagesData = new FormData()

    Array.from(imagesInput).forEach(image => {
        if(image.type == 'application/pdf'){
            let pdfName = shortenFileName(image.name)
            pdfContainer.innerHTML += `<div class="pdf-wraper"><a><i class="far fa-file-alt"></i></a><span>${pdfName}</span></div>`
        } else {
            imagesData.append('files[]', image, image.name)

            const reader = new FileReader()
            reader.readAsDataURL(image)
            reader.onload = () => {
                imagesContainer.innerHTML += `<div class="consult-image"><img src="${reader.result}"/></div>`
            }
        }
    })
}

export function removeKeys(keys, object) {
    keys.forEach(k => delete object[k]);
}


export function shortenFileName(largeFileName) {
    if(largeFileName.length > 10){
        largeFileName = largeFileName.substr(0, 4) + '...' + largeFileName.substr(largeFileName.length - 6, 6)
    }

    return largeFileName
}

export function toggleArrows(arrow){
    if (document.querySelector('.fa-chevron-right') && document.querySelector('.fa-chevron-right') !== arrow) {
        document.querySelector('.fa-chevron-right').classList.remove('fa-chevron-right', 'active-arrow')
    }
    arrow.classList.toggle('fa-chevron-right')
    arrow.classList.toggle('active-arrow')
}