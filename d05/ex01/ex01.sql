CREATE TABLE IF NOT EXISTS ft_table (
	id INT AUTO_INCREMENT, 
	login VARCHAR(6) DEFAULT 'toto' NOT NULL,
	groupe ENUM('staff','student','other') NOT NULL,
	date_de_creation DATE NOT NULL,
	PRIMARY KEY(id)
);
