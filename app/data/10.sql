/* QUERY FOR receipts_line VIEW */

SELECT
    receipts.id as "receipt_id",
    receipts.series as 'receipt_series',
    receipts.number as 'receipt_number',
    examinations.examination as 'examination_name',
    receipts.quantity,
    receipts.measurement,
    consults_examinations.price as "price_before_vat",
    trim((consults_examinations.price * (clinic.vat/100))) + 0 as 'vat',
    trim((consults_examinations.price * (1 + (clinic.vat/100)))) + 0 as 'price_with_vat'
FROM
    examinations, consults, receipts, consults_examinations, clinic
WHERE 
    receipts.consult_id = consults.id
    AND
    consults_examinations.consult_id = consults.id
    AND
    consults_examinations.examination_id = examinations.id
    AND
    receipts.clinic_id = clinic.id
GROUP BY consults_examinations.id