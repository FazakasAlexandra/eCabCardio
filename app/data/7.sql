/* QUERY FOR medical_letter VIEW */

SELECT
    consults.id AS consult_id,
    CONCAT('Medical letter released from clinic ecabcardio by Dr. ',users.name_surname,'.') AS letter_info,
    CONCAT('Patient ' , patients.surname ,' ' , patients.name , ' domiciled in ' , citys.city , ', county ' , countys.county,', with the address ' , patients.address , ', was diagnosed with ' , consults.diagnostic) AS patient_info,
    consults.consult_reason,
    consults.observations,
    consults.recommendations,
    sum(examinations.price) AS consult_price
FROM
    consults,
    patients,
    users,
    citys,
    countys,
    examinations,
    consults_examinations
WHERE 
    consults.doctor_id = users.id
    AND
    consults.patient_id = patients.id
    AND
    patients.city_id = citys.id
    AND
    citys.county_id = countys.id
    AND
    consults_examinations.consult_id = consults.id
    AND
    consults_examinations.examination_id = examinations.id
GROUP BY consults.id