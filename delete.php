<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting

$mysqli = new mysqli('oniddb.cws.oregonstate.edu','brancalr-db','ZVjjOmAKKIdkFf9u','brancalr-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($_POST['ptID']) {
	if(!($stmt = $mysqli->prepare("DELETE FROM Patient WHERE patient_id = ?"))){
		//Prepare INSERT query
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("d",$_POST['ptID']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
}
if ($_POST['mdID']) {
	if(!($stmt = $mysqli->prepare("DELETE FROM Physician WHERE physician_id = ?"))){
		//Prepare INSERT query
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("d",$_POST['mdID']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
}
if ($_POST['medID']) {
	if(!($stmt = $mysqli->prepare("DELETE FROM Medication WHERE med_id = ?"))){
		//Prepare INSERT query
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("d",$_POST['medID']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
}
if ($_POST['aeID']) {
	if(!($stmt = $mysqli->prepare("DELETE FROM Adverse_Effect WHERE ae_id = ?"))){
		//Prepare INSERT query
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("d",$_POST['aeID']))){
			//Referenced: http://php.net/manual/en/mysqli-stmt.bind-param.php	
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
	// Execute query
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
}



$stmt->close(); // Redirect back to main page now that insert query is done
$path = explode('/', $_SERVER['PHP_SELF'], - 1);
$path = implode('/', $path);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $path;
header("Location: {$redirect}/index.php");

?>

