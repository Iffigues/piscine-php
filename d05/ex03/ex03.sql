INSERT INTO ft_table(login,groupe,date_de_creation)
SELECT nom,'other' ,date_de_naissance  
FROM fiche_personne
WHERE nom LIKE '%a%'AND  LEN(login) < 9
ORDER BY nom ASC
LIMIT 10;
