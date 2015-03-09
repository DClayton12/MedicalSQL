<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','claytond-db','0scRzn1A9MkIFkzK','claytond-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//  get PATIENT variables from POST request
$dob= $_POST['npi'];
$fname= $_POST['license'];
$lname= $_POST['pt_id'];

if(!empty($dob) && !empty($fname) && !empty($lname) && !empty($phone) && !empty($house) && !empty($street_name) && !empty($town) && !empty($pcp_id)){
	//Only if user inputs all specified data. 
	if(!($stmt = $mysqli->prepare("INSERT INTO Physician(npi, license, pt_id) VALUES (?,?,?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ddd",$_POST['npi'],$_POST['license'],$_POST['pt_id']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
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
	if(empty($phone)) {
		echo 'Phone is a required field. ';
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