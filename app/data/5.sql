/* QUERY FOR consults_examinations_view VIEW */

SELECT
    consults_examinations.consult_id,
    examinations.examination,
    examinations.price
FROM
    examinations,
    consults_examinations
WHERE 
examinations.id = consults_examinations.examination_id