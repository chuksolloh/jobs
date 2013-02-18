# create database.
CREATE DATABASE jobfinder;

# create table for employee.
USE jobfinder;
CREATE TABLE employee(
    id INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    cvpath TEXT NOT NULL,
    created DATETIME NOT NULL,
    modified TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    PRIMARY KEY(id)
)ENGINE=MyISAM;

CREATE TABLE employer(
    id INT AUTO_INCREMENT NOT NULL,
    companyname VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    created DATETIME NOT NULL,
    modified TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    PRIMARY KEY(id)
)ENGINE=MyISAM;
