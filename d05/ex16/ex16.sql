SELECT COUNT(id_film) as 'films'
from member_history
WHERE date BETWEEN '30/10/2006' AND '27/07/2007'
OR MONTH(date) = 12 AND DAY(date) = 24
GROUP BY id_film;
