CREATE TABLE users(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(256) NOT NULL,
    lastname VARCHAR(256) NOT NULL,
    username VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL

);

CREATE TABLE profileimg (
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid INT(11) NOT NULL,
    status INT(11) NOT NULL
);