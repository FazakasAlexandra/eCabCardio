/* QUERY FOR consults_examinations UPDATE */

UPDATE consults_examinations
SET consults_examinations.price = (SELECT E.price FROM examinations E WHERE E.id = consults_examinations.examination_id)