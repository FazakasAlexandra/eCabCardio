/* QUERY FOR consults_examinations_view VIEW */

SELECT
    consults_analysis.consult_id,
    analysis.analysis,
    analysis.price
FROM
    analysis,
    consults_analysis
WHERE 
analysis.id = consults_analysis.analysis_id  