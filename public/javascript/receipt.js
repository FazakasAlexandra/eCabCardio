import { db } from './db.js'

const selectCompanyInput = document.querySelector('.company-select')
const companyContainer = document.querySelector('.selected-company-container')
const companyForm = document.querySelector('.add-company-form')
const createButton = document.querySelector('.create-receipt')
const createReceiptButton =  document.querySelector('.create-receipt')

const buyer = {
    person_id: createButton.getAttribute('patientId'),
    company_id: null,
}

function hideElement(element) {
    element.classList.add('hidden')
}

function showElement(element) {
    element.classList.remove('hidden')
}

function radiosEvents() {
    document.querySelectorAll('input[name="buyer_type"]').forEach(radio => {
        radio.addEventListener('click', (e) => {

            showElement(document.querySelector(`#${e.target.value}-field`))

            if (e.target.value === 'company') {
                buyer.person_id = null
                hideElement(document.querySelector(`#person-field`))
            } else {
                buyer.company_id = null
                buyer.person_id = createButton.getAttribute('patientId')
                hideElement(companyForm)
                hideElement(companyContainer)
                hideElement(document.querySelector(`#company-field`))
            }
        })
    });
}

function selectCompanyEvent() {
    selectCompanyInput.addEventListener('change', (e) => {
        hideElement(companyForm)
        const selectedCompanyId = e.target.value

        if (selectedCompanyId != 0) {
            buyer.company_id = selectedCompanyId;
            showElement(companyContainer)
            db.companies.fetchCompanies(selectedCompanyId).then((company) => fillCompanyContainer(company));
            return
        }

        buyer.company_id = null
        hideElement(companyContainer)
    })
}

function fillCompanyContainer(company) {
    delete company.id
    companyContainer.innerHTML = Object.keys(company).reduce((acc, key) => {
        return `${acc}<div class="inner-wrapper ${key}">
                        <p>${key.replace(/_/g, ' ')}</p>
                        <input class="form-control" disabled value="${company[key]}">
                      </div>`
    }, '')
}

function addCompanyEvent() {
    document.querySelector('.add-company').addEventListener('click', () => {
        buyer.company_id = 'unset'
        selectCompanyInput.value = 0
        hideElement(companyContainer)
        showElement(companyForm)
    })
}

function positiveFeedBack(input) {
    if (input.classList.contains('is-invalid') || !input.classList.contains('is-valid')) {
        console.log('bye is-invalid')
        input.classList.remove('is-invalid')
        input.classList.add('is-valid')
    }
}

function validateCompany(company, validate = []) {
    document.querySelector('#selected-company').classList.remove('is-invalid')
    document.querySelector('.company-wrapper').querySelectorAll('input').forEach(input => positiveFeedBack(input));

    Object.keys(company).forEach(key => {
        if (company[key] === '') {
            validate.push({
                field: key.replace(/_/g, '-'),
                error: `company ${key.replace(/_/g, ' ')} cannot be empty !`
            })
        }
    })

    if (document.querySelector('#county').value == 0) {
        validate.push({
            field: 'county',
            error: `company county cannot be empty !`
        })
    } else {
        positiveFeedBack(document.querySelector('#county'))
    }

    return validate
}

function handleCompanyPost() {
    const company = {
        name: document.querySelector('#name').value,
        fiscal_number: document.querySelector('#fiscal-number').value,
        orc_number: document.querySelector('#orc-number').value,
        address: document.querySelector('#address').value,
        bank: document.querySelector('#bank').value,
        bank_account: document.querySelector('#bank-account').value,
        county_id: document.querySelector('#county').value
    }

    const validate = validateCompany(company)

    if (validate.length === 0) {
        db.companies.postCompany(company).then((buyer_id) => postReceipt(buyer_id));
    } else {
        displayErrors(validate)
    }
}

function postReceipt(buyer_id) {
    const today = new Date().toISOString().slice(0, 10)
    db.receipts.postReceipt({
        buyer_id: buyer_id,
        consult_id: createButton.getAttribute('consultId'),
        user_id: 5, // HARDCODED USER_ID !!
        series: document.querySelector('#receipt_series').value,
        number: document.querySelector('#receipt_number').value,
        date: document.querySelector('#receipt-date') || today
    }).then((message) => {
        console.log(message)
        hideElement(createReceiptButton);
        showElement(document.querySelector('.alert-success'))
    })
}

function displayErrors(validate) {
    validate.forEach(error => {
        document.querySelector(`#${error.field}`).classList.add('is-invalid')
    })
}

function createReceiptEvent() {
    createReceiptButton.addEventListener('click', (e) => {
        if (buyer.company_id === null && buyer.person_id === null) return displayErrors([{ field: 'selected-company', error: 'Please chose a company !' }]);

        if (buyer.company_id === 'unset') return handleCompanyPost();

        if (buyer.company_id === null) return db.buyers.getPatientBuyerId(buyer.person_id).then((buyer_id) => postReceipt(buyer_id))

        db.buyers.getCompanyBuyerId(buyer.company_id).then((buyer_id) => postReceipt(buyer_id))

    })
}

radiosEvents()
selectCompanyEvent()
addCompanyEvent()
createReceiptEvent()
