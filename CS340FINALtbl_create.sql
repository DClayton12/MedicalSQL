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
	med_id INT(11) NOT NULL, 
	pt_id INT(11) NOT NULL, 
	PRIMARY KEY(ae_id) )ENGINE=InnoDB;


-- Create a table called operating_system with the following properties:
-- id - an auto incrementing integer which is the primary key
-- name - a varchar of maximum length 255, cannot be null
-- version - a varchar of maximum length 255, cannot be null
-- name version combinations must be unique

CREATE TABLE Patient ( 
	patient_id INT(11) NOT NULL AUTO_INCREMENT,
	dob INT(11) NOT NULL, 
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL, 
	phone INT(11) NOT NULL,
	pcp_id INT(11) NOT NULL,
	med_id INT(11) NOT NULL, 
	house INT(11) NOT NULL, 
	street_name varchar(255) NOT NULL, 
	town varchar(255) NOT NULL, 
	ae_id INT(11) NOT NULL, 
	PRIMARY KEY(patient_id) )ENGINE=InnoDB;



-- Create a table called device with the following properties:
-- id - an auto incrementing integer which is the primary key
-- cid - an integer which is a foreign key reference to the category_tbl table
-- name - a varchar of maximum length 255 which cannot be null
-- received - a date type (you can read about it here http://dev.mysql.com/doc/refman/5.0/en/datetime.html)
-- isbroken - a boolean

CREATE TABLE Medication ( 
	med_id INT(11) NOT NULL AUTO_INCREMENT, 
	quantity INT(11) NOT NULL, 
	formulation varchar(255) NOT NULL, 
	pt_id INT(11) NOT NULL, 
	ae_id INT(11) NOT NULL, 
	md_id INT(11) NOT NULL, 
	PRIMARY KEY(med_id) )ENGINE=InnoDB;


-- Site I Referenced: http://www.sqlusa.com/bestpractices/bitdatatype/

-- Create a table called os_support with the following properties, this is a table representing a many-to-many relationship
-- between devices and operating systems:
-- did - an integer which is a foreign key reference to device
-- osid - an integer which is a foreign key reference to operating_system
-- notes - a text type
-- The primary key is a combination of did and osid

CREATE TABLE Physician (
    physician_id INT(11) NOT NULL AUTO_INCREMENT,
    npi INT(11) NOT NULL,
    license INT(11) NOT NULL,
    pt_id INT(11) NOT NULL,
    med_id INT(11) NOT NULL,
    PRIMARY KEY(physician_id)
    )ENGINE=InnoDB;


-- Site I referenced: http://stackoverflow.com/questions/564755/sql-server-text-type-vs-varchar-data-type

-- insert the following into the category_tbl table:

-- name: phone
-- subcategory: maybe a tablet?
ALTER TABLE Patient 
	ADD FOREIGN KEY(pcp_id) 
	REFERENCES 	Physician(physician_id);

-- name: tablet
-- subcategory: but kind of a laptop
ALTER TABLE Patient 
	ADD FOREIGN KEY(med_id) 
	REFERENCES Medication(med_id);


-- name: tablet
-- subcategory: ereader
ALTER TABLE Patient 
	ADD FOREIGN KEY(ae_id) 
	REFERENCES Adverse_Effect(ae_id);

-- insert the folowing into the operating_system table:
-- name: Android
-- version: 1.0
ALTER TABLE Medication 
	ADD FOREIGN KEY(pt_id) 
	REFERENCES Patient(patient_id);

-- name: Android
-- version: 2.0
ALTER TABLE Medication 
	ADD FOREIGN KEY(ae_id) 
	REFERENCES Adverse_Effect(ae_id);

-- name: iOS
-- version: 4.0
ALTER TABLE Medication 
	ADD FOREIGN KEY(md_id) 
	REFERENCES Physician(physician_id);

-- insert the following devices instances into the device table (you should use a subquery to set up foriegn keys referecnes, no hard coded numbers):
-- cid - reference to name: phone subcategory: maybe a tablet?
-- name - Samsung Atlas
-- received - 1/2/1970
-- isbroken - True

ALTER TABLE Physician 
	ADD FOREIGN KEY(pt_id) 
	REFERENCES Patient(patient_id);

-- cid - reference to name: tablet subcategory: but kind of a laptop
-- name - Nokia
-- received - 5/6/1999
-- isbroken - False

ALTER TABLE Physician 
	ADD FOREIGN KEY(med_id) 
	REFERENCES Medication(med_id);
-- cid - reference to name: tablet subcategory: ereader
-- name - jPad
-- received - 11/18/2005
-- isbroken - False
ALTER TABLE Adverse_Effect 
	ADD FOREIGN KEY(med_id)
	REFERENCES Medication(med_id);

-- insert the following into the os_support table using subqueries to look up data as needed:
-- device: Samsung Atlas
-- os: Android 1.0
-- notes: Works poorly
ALTER TABLE Adverse_Effect 
	ADD FOREIGN KEY(pt_id) 
	REFERENCES Patient(patient_id);