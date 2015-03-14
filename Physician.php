<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','brancalr-db','ZVjjOmAKKIdkFf9u','brancalr-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//  get PHYSICIAN variables from POST request
$npi = $_POST['npi'];
$license = $_POST['license'];
$pt_id = $_POST['pt_id'];
$name = $_POST['name'];


if(!empty($npi) && !empty($license) && !empty($pt_id) && !empty($name)){
	//Only if user inputs all specified data. 
	if(!($stmt = $mysqli->prepare("INSERT INTO Physician(npi, license, name) VALUES (?,?,?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("dds",$_POST['npi'],$_POST['license'],$_POST['name']))){
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

	if(empty($npi)) { // One or more inputs are empty. These may not be NULL.
		echo 'NPI is a required field. ';
	}
	if(empty($license)) {
		echo 'License # is a required field. ';
	}
	if(empty($pt_id)) {
		echo 'Patient ID is a required field. ';
	}
	if(empty($name)) {
		echo 'Name is a required field. ';
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
  </p>
  </body>
</html>