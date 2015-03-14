<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','brancalr-db','ZVjjOmAKKIdkFf9u','brancalr-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//  get PATIENT variables from POST request
$dob= $_POST['dob'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$house= $_POST['house'];
$street_name= $_POST['street_name'];
$town= $_POST['town'];
$pcp_id= $_POST['pcp_id'];


if(!empty($dob) && !empty($fname) && !empty($lname) && !empty($house) && !empty($street_name) && !empty($town) && !empty($pcp_id)){
	//Only if user inputs all specified data. 
	if(!($stmt = $mysqli->prepare("INSERT INTO Patient(dob, fname, lname, house, street_name, town) VALUES (?,?,?,?,?,?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("dssdss",$_POST['dob'],$_POST['fname'],$_POST['lname'],$_POST['house'],$_POST['street_name'],$_POST['town']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}

<<<<<<< HEAD
=======
	if(!($stmt = $mysqli->prepare("INSERT INTO pt_md(pt_id,md_id) VALUES ((SELECT patient_id FROM Patient WHERE fname=($fname) AND lname=($lname) AND dob=($dob), ? )"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("dd",WHAT GOES HERE TO INSERT PATIENT ID FROM SUBQUERY,$_POST['pcp_id']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	

>>>>>>> ea6f3709e7970f8946aecf8d8de6d2e3273a7335
	$stmt->close(); // Redirect back to main page now that insert query is done
	$path = explode('/', $_SERVER['PHP_SELF'], - 1);
	$path = implode('/', $path);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $path;
	header("Location: {$redirect}/index.php");
	if(empty($dob)) { // One or more inputs are empty. These may not be NULL.
		echo 'Birthdate is a required field. ';
	}
	if(empty($fname)) {
		echo 'First name is a required field. ';
	}
	if(empty($lname)) {
		echo 'Last name is a required field. ';
	}
	if(empty($house)) {
		echo 'House number is a required field. ';
	}
	if(empty($street_name)) {
		echo 'Street name is a required field. ';
	}
	if(empty($town)) {
		echo 'Town is a required field. ';
	}
	if(empty($pcp_id)) {
		echo 'Physician ID# is a required field. ';
	}
	}
?>

<!DOCTYPE html> 
<html>
  <head>
    <title>Clayton, Brancale CS340 Final</title>
  </head>
  <body>
  <p>
  <a href="index.php">Click here to return to the main page.</a>
  </body>
</html>