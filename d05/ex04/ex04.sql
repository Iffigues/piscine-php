SET date_de_creation = DATE_ADD(date_de_creation, INTERVAL 20 DAY);
FROM ft_table
WHERE id > 5;
