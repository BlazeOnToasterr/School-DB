CREATE TABLE students (
	userid INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    age INT,
    grade INT,
    day	INT,
    month INT,
    year INT,
    contact VARCHAR(15),
    restrictions VARCHAR(200),
    gender VARCHAR(10),
    nationality VARCHAR(40),
    Address VARCHAR(255),
    bloodgroup VARCHAR(10),
    
    PRIMARY KEY (userid)
);