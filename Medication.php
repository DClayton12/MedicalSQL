<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','claytond-db','0scRzn1A9MkIFkzK','claytond-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//  get Medication variables from POST request
$name= $_POST['name'];
$strength= $_POST['strength'];
$quantity= $_POST['quantity'];

if(!empty($name) && !empty($strength) && !empty($quantity)){
	//Only if user inputs all specified data. 
	if(!($stmt = $mysqli->prepare("INSERT INTO Medication(name, strength, quantity) VALUES (?,?,?)"))){
		//Prepare INSERT query
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("sdd",$_POST['name'],$_POST['strength'],$_POST['quantity']))){
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
	if(empty($name)) { // One or more inputs are empty. These may not be NULL.
		echo 'Medication name is a required field. ';
	}
	if(empty($strength)) {
		echo 'Medication strength is a required field. ';
	}
	if(empty($quantity)) {
		echo 'Medication quantity is a required field. ';
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