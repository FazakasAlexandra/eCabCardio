/* QUERY FOR consults_analysis UPDATE */

UPDATE consults_analysis
SET consults_analysis.price = (SELECT A.price FROM analysis A WHERE A.id = consults_analysis.analysis_id)