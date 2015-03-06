<?php
//Darnel Clayton , Robert Brancale
ini_set('display_errors', 'On'); //Error reporting
$mysqli = new mysqli('oniddb.cws.oregonstate.edu','claytond-db','0scRzn1A9MkIFkzK','claytond-db'); //connect to DB
if ($mysqli->connect_error) {
    die('Cannot connect to SQL Database. (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Clayton Brancale CS340 Final</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.2/sandstone/bootstrap.min.css" rel="stylesheet"/>
    <h2>CS340 Final</h2>
      <h4>by Robert Brancale and Darnel Clayton</h4>
    <style>
    	body {
    		margin-top: 80px;
    	}
    </style>
  </head>
  <body>
    <br>
    <br>
    <br>
  <div>
  	<form action="Patient.php" method="post" id="Patient">
		  <div class="ptInfo">
          <label class="col-sm-3 control-label">Patient Information:</label>
          <div class="col-sm-3">
            <input class="form-control" id="fname" name="fname" placeholder="First name.." type="text">
            <input class="form-control" id="lname" name="lname" placeholder="Last name.." type="text">
            <input class="form-control" id="dob" name="dob" placeholder="Birthdate.." type="date">
            <input class="form-control" id="phone" name="phone" placeholder="Phone.." type="number">
            <input class="form-control" id="house" name="house" placeholder="Street Address.." type="number">
            <input class="form-control" id="street_name" name="street_name" placeholder="Street.." type="text">
            <input class="form-control" id="town" name="town" placeholder="Town.." type="text">
            <input class="form-control" id="state" name="state" placeholder="State.." type="state">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-8">
           <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </div>
   	</form>
	<form action="physician.php" method="post" id="Physician">
    <div class="mdInfo">
      <label class="col-sm-3 control-label">Physician Information:</label>
      <div class="col-sm-3">
        <input class="form-control" id="physician_id" name="physician_id" placeholder="ID No." type="text">
        <input class="form-control" id="npi" name="npi" placeholder="NPI No." type="text">
        <input class="form-control" id="license" name="license" placeholder="License No." type="number">
        <input class="form-control" id="pt_id" name="pt_id" placeholder="Pt ID No." type="number">
	  </div>
	</div>
	<div class="form-group">
      <div class="col-sm-2 col-sm-offset-8">
       <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>
    </div>
    </form>
   	</div>
  </body>
</html>