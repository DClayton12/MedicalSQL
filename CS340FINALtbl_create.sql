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
DROP TABLE IF EXISTS `pt_meds`;
DROP TABLE IF EXISTS `pt_md`;
DROP TABLE IF EXISTS `med_effect`;
DROP TABLE IF EXISTS `md_meds`;

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

CREATE TABLE Patient ( 
	patient_id INT(11) NOT NULL AUTO_INCREMENT,
	dob date NOT NULL, 
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL, 
	house INT(11) NOT NULL, 
	street_name varchar(255) NOT NULL, 
	town varchar(255) NOT NULL, 
	PRIMARY KEY(patient_id) )ENGINE=InnoDB;

CREATE TABLE Medication ( 
	med_id INT(11) NOT NULL AUTO_INCREMENT, 
	name varchar(255) NOT NULL,
	quantity INT(11) NOT NULL, 
	formulation varchar(255) NOT NULL, 
	PRIMARY KEY(med_id) )ENGINE=InnoDB;

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

SELECT [patient_id], [fname], [lname], [dob], [house], [street_name], [town]
FROM Patient;

SELECT [physician_id], [name] 
FROM Physician;

SELECT [med_id], [name] 
FROM Adverse_Effect;

SELECT [ae_id], [description]
FROM Adverse_Effect;

INSERT INTO Adverse_Effect 
VALUES([severity], [description]);

INSERT INTO Physician
VALUES([npi], [license], [name]);

INSERT INTO Medication
VALUES([name], [strength], [quantity]);

INSERT INTO Patient
VALUES([dob], [fname], [lname], [house], [street_name], [town]);

DELETE FROM Patient 
WHERE patient_id = [patient id no.];

DELETE FROM Physician 
WHERE physician_id = [physician id no.];

DELETE FROM Medication 
WHERE med_id = [medication id no.];

DELETE FROM Adverse_Effect 
WHERE ae_id = [adverse id no.];

UPDATE  Patient
SET patient_id =  [new patient id no.] 
WHERE  patient_id = [old patient id no.];