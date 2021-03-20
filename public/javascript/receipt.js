console.log('hi')
import {db} from './db.js'

const selectCompanyInput = document.querySelector('.company-select')
const selectedCompanyContainer = document.querySelector('.selected-company-container')
const companyForm = document.querySelector('.add-company-form')
let receipt = {}

document.querySelectorAll('input[name="buyer_type"]').forEach(radio => {
    radio.addEventListener('click', (e) => {
        if(e.target.value === 'company') {
            document.querySelector(`#${e.target.value}-field`).classList.remove('hidden')
            document.querySelector(`#person-field`).classList.add('hidden')
        } else {
            document.querySelector(`#company-field`).classList.add('hidden')
            document.querySelector(`#${e.target.value}-field`).classList.remove('hidden')
        }
    })
});

selectCompanyInput.addEventListener('change', (e)=>{
    companyForm.classList.add('hidden')
    if(e.target.value != 0){
        selectedCompanyContainer.classList.remove('hidden')
        db.companies.fetchCompanies(e.target.value).then((company) => {
            console.log(company)

            receipt.company_id = company.id
            delete company.id

            selectedCompanyContainer.innerHTML = Object.keys(company).reduce((acc, key) => {
                return `${acc}<div class="inner-wrapper ${key}"><p>${key.replace(/_/g, ' ')}</p><input class="form-control" disabled value="${company[key]}"></div>`
            }, '')
        })
    } else {
        selectedCompanyContainer.classList.add('hidden')
    }
})

document.querySelector('.add-company').addEventListener('click', () => {
    selectCompanyInput.value = 0
    selectedCompanyContainer.classList.add('hidden')
    console.log('add new company')
    companyForm.classList.remove('hidden')
})