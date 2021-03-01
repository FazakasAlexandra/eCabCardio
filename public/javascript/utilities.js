import {db} from './db.js'

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

export function cancelButtonEvent(form){
    form.querySelector('.cancel').addEventListener('click', ()=>hideForm(form))
}

export function selectCitiesChangeEvent(form) {
    let citiesInput = form.querySelector('#city')

    form.querySelector('#city').addEventListener('change', () => {
        let countyInput = form.querySelector('#county')
        let countyId = citiesInput.options[citiesInput.selectedIndex].getAttribute('county_id')

        db.counties.fetchCounty(countyId).then(county => {
            countyInput.value = county.county
            countyInput.setAttribute('county_id', county.id)
        })

    })
}
``
export function fillSelectInputs(patientCityId = 0, form) {
    let citiesSelectInput = form.querySelector('#city')

    form.querySelector('#county').value = ""
    if(patientCityId === 0) citiesSelectInput.innerHTML = "<option value='0' county_id='0' selected>Select a city</option>"

    db.cities.fetchCities().then((cities) => {
        citiesSelectInput.innerHTML += cities.reduce((acc, city) => {
            if (patientCityId == city.id) return `${acc}<option value=${city.id} county_id=${city.county_id} selected>${city.city}</option>`
            return `${acc}<option value=${city.id} county_id=${city.county_id}>${city.city}</option>`
        }, '')
    })
}

export function hideForm(form) {
    if(!form.classList.contains('hidden')) form.classList.add('hidden')
}

export function showForm(form) {
    if(form.classList.contains('hidden')) form.classList.remove('hidden')
}

export function collectTextValues(form, patient = {}){
    form.querySelectorAll('input').forEach((input)=>{
        if(input.id === 'county') return
        if(input.type !== 'radio' ) {
            patient[input.id] = input.value
        } else {
            if(input.checked) patient.married = input.value
        }
    })

    patient.city_id = form.querySelector('#city').value

    return patient
}