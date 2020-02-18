DROP DATABASE IF EXISTS user;
CREATE DATABASE user;
USE user;

CREATE TABLE information_user
(
    email varchar(50) NOT NULL PRIMARY KEY,
    pass varchar(60) NOT NULL,
    essaie tinyint default 0,
    nom varchar(50),
    prenom varchar(50)
);

CREATE TABLE forgot
(
    code varchar(8) NOT NULL,
    email varchar(50) NOT NULL,
    id int AUTO_INCREMENT PRIMARY KEY
);