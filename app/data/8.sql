/* 
updates receipts.buyer_id :

UPDATE `consults`, `receipts`, `buyers`
SET receipts.buyer_id = buyers.id
WHERE receipts.consult_id = consults.id 
AND consults.patient_id = buyers.patient_id

updates receipts.user_id :

UPDATE `consults`, `receipts`
SET receipts.user_id = consults.doctor_id
WHERE receipts.consult_id = consults.id 

*/