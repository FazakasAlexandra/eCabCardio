export function displayImages(imagesContainer) {
    const imagesInput = document.querySelector('#images').files

    let imagesData = new FormData()

    Array.from(imagesInput).forEach(image => {
        console.log(image)
        imagesData.append('images[]', image, image.name)

        const reader = new FileReader()
        reader.readAsDataURL(image)
        reader.onload = () => {
            imagesContainer.innerHTML += `<div class="consult-image"><img src="${reader.result}"/></div>`
        }
    })
}

export function toggleArrows(arrow){
    if (document.querySelector('.fa-chevron-right') && document.querySelector('.fa-chevron-right') !== arrow) {
        document.querySelector('.fa-chevron-right').classList.remove('fa-chevron-right', 'active-arrow')
    }
    arrow.classList.toggle('fa-chevron-right')
    arrow.classList.toggle('active-arrow')
}