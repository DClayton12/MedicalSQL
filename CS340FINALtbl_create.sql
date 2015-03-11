-- Darnel Clayton
-- Robert Brancale
-- CS340 Final
-- 3/3/2015

-- For part one of this assignment you are to make a database with the following specifications and run the following queries
-- The drop table queries below are to facilitate testing on my end

DROP TABLE IF EXISTS `Adverse_Effect`;
DROP TABLE IF EXISTS `Patient`;
DROP TABLE IF EXISTS `Medication`;
DROP TABLE IF EXISTS `Physician`;


-- Create a table called Adverse_Effect with the following properties:
-- ae_id - an auto incrementing integer which is the primary key
-- name, description - varchar with a maximum length of 255 characters, cannot be null
-- subcategory - a varchar with a maximum length of 255 characters, cannot be null
-- med_id, pt_id are foreign keys.

CREATE TABLE Adverse_Effect (
	ae_id INT(11) NOT NULL AUTO_INCREMENT,
	severity varchar(255) NOT NULL, 
	description varchar(255) NOT NULL, 
	PRIMARY KEY(ae_id) )ENGINE=InnoDB;


-- Create a table called operating_system with the following properties:
-- id - an auto incrementing integer which is the primary key
-- name - a varchar of maximum length 255, cannot be null
-- version - a varchar of maximum length 255, cannot be null
-- name version combinations must be unique

CREATE TABLE Patient ( 
	patient_id INT(11) NOT NULL AUTO_INCREMENT,
	dob date NOT NULL, 
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL, 
	house INT(11) NOT NULL, 
	street_name varchar(255) NOT NULL, 
	town varchar(255) NOT NULL, 
	PRIMARY KEY(patient_id) )ENGINE=InnoDB;



-- Create a table called device with the following properties:
-- id - an auto incrementing integer which is the primary key
-- cid - an integer which is a foreign key reference to the category_tbl table
-- name - a varchar of maximum length 255 which cannot be null
-- received - a date type (you can read about it here http://dev.mysql.com/doc/refman/5.0/en/datetime.html)
-- isbroken - a boolean

CREATE TABLE Medication ( 
	med_id INT(11) NOT NULL AUTO_INCREMENT, 
	name varchar(255) NOT NULL,
	quantity INT(11) NOT NULL, 
	formulation varchar(255) NOT NULL, 
	PRIMARY KEY(med_id) )ENGINE=InnoDB;


-- Site I Referenced: http://www.sqlusa.com/bestpractices/bitdatatype/

-- Create a table called os_support with the following properties, this is a table representing a many-to-many relationship
-- between devices and operating systems:
-- did - an integer which is a foreign key reference to device
-- osid - an integer which is a foreign key reference to operating_system
-- notes - a text type
-- The primary key is a combination of did and osid

CREATE TABLE Physician(
    physician_id INT(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    npi INT(11) NOT NULL,
    license INT(11) NOT NULL,
    PRIMARY KEY(physician_id)
    )ENGINE=InnoDB;


CREATE TABLE pt_meds(
 	pt_id int(11) NOT NULL,
 	med_id int(11) NOT NULL,
 	FOREIGN KEY(pt_id) REFERENCES Patient(patient_id),
 	FOREIGN KEY(med_id) REFERENCES Medication(med_id),
 	PRIMARY KEY(pt_id, med_id)
 )ENGINE=InnoDB;

CREATE TABLE pt_md(
 	pt_id int(11) NOT NULL,
 	md_id int(11) NOT NULL,
 	FOREIGN KEY(pt_id) REFERENCES Patient(patient_id),
 	FOREIGN KEY(md_id) REFERENCES Physician(physician_id),
 	PRIMARY KEY(pt_id, md_id)
 )ENGINE=InnoDB;

CREATE TABLE med_effect(
 	med_id int(11) NOT NULL,
 	effect_id int(11) NOT NULL,
 	FOREIGN KEY(med_id) REFERENCES Medication(med_id),
 	FOREIGN KEY(effect_id) REFERENCES Adverse_Effect(ae_id),
 	PRIMARY KEY(med_id, effect_id)
 )ENGINE=InnoDB;

CREATE TABLE md_meds(
 	md_id int(11) NOT NULL,
 	med_id int(11) NOT NULL,
 	FOREIGN KEY(md_id) REFERENCES Physician(physician_id),
 	FOREIGN KEY(med_id) REFERENCES Medication(med_id),
 	PRIMARY KEY(md_id, med_id)
 )ENGINE=InnoDB;
