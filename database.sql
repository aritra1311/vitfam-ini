CREATE database vitfam;
USE vitfam;
GRANT ALL ON vitfam.* TO 'fam'@'localhost' IDENTIFIED BY 'fam123';
GRANT ALL ON vitfam.* TO 'fam'@'127.0.0.1' IDENTIFIED BY 'fam123';
CREATE table temp(
    process varchar(32) NULL,
    email varchar(50) NULL,
    pass varchar(32) NULL
    );
CREATE table users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email varchar(50) NULL,
    pass varchar(32) NULL,
    amount INT DEFAULT 100000,
    stars FLOAT NULL
    );
CREATE TABLE blocked (
    email varchar(60) NOT NULL PRIMARY KEY,
    attempts int(11) DEFAULT NULL,
    dateCreated timestamp NOT NULL DEFAULT current_timestamp()
    );