<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','claytond-db','0scRzn1A9MkIFkzK','claytond-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//  get ADVERSE EFFECT variables from POST request
$severity= $_POST['severity'];
$description= $_POST['description'];
$med_id= $_POST['med_id'];
$pt_id= $_POST['pt_id'];

if(!empty($severity) && !empty($description) && !empty($med_id) && !empty($pt_id)){
	//Only if user inputs all specified data. 
	if(!($stmt = $mysqli->prepare("INSERT INTO Adverse_Effect(severity, description) VALUES (?,?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ss",$_POST['severity'],$_POST['description']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	
	if(!($stmt = $mysqli->prepare("INSERT INTO med_effect(med_id) VALUES (?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("d",$_POST['med_id']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}

	$stmt->close(); // Redirect back to main page now that insert query is done
	$path = explode('/', $_SERVER['PHP_SELF'], - 1);
	$path = implode('/', $path);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $path;
	header("Location: {$redirect}/index.php");

	if(empty($severity)) { // One or more inputs are empty. These may not be NULL.
		echo 'Severity is a required field. ';
	}
	if(empty($description)) {
		echo 'Description is a required field. ';
	}
	if(empty($med_id)) {
		echo 'Medication ID is a required field. ';
	}
	if(empty($pt_id)) {
		echo 'Patient ID# is a required field. ';
	}
	if(empty($house)) {
		echo 'House number is a required field. ';
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