SELECT
    receipts.id as receipt_id,
    consults.date as consult_date,
    consults.hour as consult_hour, 
    users.name_surname as doctor_name,
    patients.name AS patient_name,
    companies.name AS company_name,
    companies.fiscal_number AS company_fiscal_number,
    companies.orc_number AS company_orc_number,
    companies.address AS company_address,
    companies.bank_account AS company_bank_account,
    companies.bank AS company_bank,
    c.clinic_name,
    c.fiscal_number AS clinic_fiscal_number,
    c.orc_number AS clinic_orc_number,
    c.phone AS clinic_phone,
    c.fax AS clinic_fax,
    c.bank_account AS clinic_bank_account,
    c.bank AS clinic_bank
FROM receipts
    INNER JOIN buyers ON receipts.buyer_id = buyers.id
    INNER JOIN consults ON receipts.consult_id = consults.id
    INNER JOIN clinic c ON receipts.clinic_id = c.id
    INNER JOIN users ON receipts.user_id = users.id
    LEFT OUTER JOIN patients ON patients.id = buyers.patient_id
    LEFT OUTER JOIN companies ON companies.id = buyers.company_id