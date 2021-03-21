export let db = {
    consults : {
        fetchConsult : (consultId) => {
            return fetch(`/ecabcardio/public/consults/${consultId}`)
            .then(res => res.json())
            .then(res => res.consult)
        },
        fetchMedicalLetter : (consultId) => {
            return fetch(`/ecabcardio/public/consults/${consultId}/letter`)
                .then(res => res.json())
                .then(res => res.medical_letter)
        },
        fetchConsultImages : (consultId) => {
            return fetch(`/ecabcardio/public/consults/${consultId}/files`)
                .then(res => res.json())
                .then(res => res.consult_images)
        },
        uploadFiles : (consultId, formData) => {
            return fetch(`/ecabcardio/public/consults/${consultId}/files`, {
                method: 'POST',
                body: formData
            })
        } 
    },
    
    patients : {
        fetchPatient : (patientId) => {
            return fetch(`/ecabcardio/public/patients/${patientId}`)
            .then(res => res.json())
            .then(res => res.patient)
        }
    },

    cities : {
        fetchCities : () => {
            return fetch(`/ecabcardio/public/cities`)
                .then(res => res.json())
                .then(res => res.cities)
        }
    },

    counties : {
        fetchCounty : (countyId) => {
            return fetch(`/ecabcardio/public/counties/${countyId}`)
            .then(res => res.json())
            .then(res => res.county)
        }
    },
    companies : {
        fetchCompanies : (companyId) => {
            return fetch(`/ecabcardio/public/companies/${companyId}`)
            .then(res => res.json())
            .then(res => res.company)
        },

        postCompany : (company) => {
            return fetch(`/ecabcardio/public/companies`, {
                method : "POST",
                headers : {
                    'content-type' : 'application/json'
                },
                body: JSON.stringify(company)
            })
            .then(res => res.json())
            .then(res => res.buyer_id)
        }
    },
    receipts : {
        postReceipt : (receipt) => {
            return fetch(`/ecabcardio/public/receipts`, {
                method : "POST",
                headers : {
                    'content-type' : 'application/json'
                },
                body: JSON.stringify(receipt)
            })
            .then(res => res.json())
            .then(res => res.receipt_id)
        }
    },
    buyers : {
        getCompanyBuyerId : (companyId) => {
            return fetch(`/ecabcardio/public/buyers/companies/${companyId}`)
            .then(res => res.json())
            .then(res => res.buyer_id)
        },

        getPatientBuyerId : (patientId) => {
            return fetch(`/ecabcardio/public/buyers/persons/${patientId}`)
            .then(res => res.json())
            .then(res => res.buyer_id)
        },
    }

}