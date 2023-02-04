USE loginpagedb;

CREATE TABLE users(
    user_id INT AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL,
    lastName VARCHAR(40),
    email VARCHAR(50) NOT NULL,
    password VARCHAR(80) NOT NULL,
    userType CHAR(10) DEFAULT 'user',
    PRIMARY KEY(user_id)
);

INSERT INTO users VALUES(1, 'Teo', 'Sanches', 'email@example.com', 'passWordteos.*', 'Admin');
INSERT INTO users VALUES(2, 'Camilo', 'Sarmiento', 'camilosar@example.com', 'mypassEx', 'user');
INSERT INTO users VALUES(3, 'Andrea', 'Sanches', 'andreasan@example.com', 'HolapasS', 'Admin');
INSERT INTO users VALUES(4, 'Mateo', 'Rojas', 'mateoroj@example.com', 'RojasT.', 'user');
INSERT INTO users VALUES(5, 'Daniela', 'Alvarez', 'danielaal@example.com', 'AlvaDani', 'user');
