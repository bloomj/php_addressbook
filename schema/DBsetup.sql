    CREATE DATABASE Addressbook;
    
    USE Addressbook;
    
    CREATE TABLE person ( 

    person_id INT(10) NOT NULL AUTO_INCREMENT,

    first_name VARCHAR(40),

    last_name VARCHAR(40),

    birthdate DATE,

    email_address VARCHAR(40),

    PRIMARY KEY (person_id)

    );