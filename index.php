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
            <input class="form-control" id="house" name="house" placeholder="Street Address.." type="number" min="1">
            <input class="form-control" id="street_name" name="street_name" placeholder="Street.." type="text">
            <input class="form-control" id="town" name="town" placeholder="Town.." type="text">
            <input class="form-control" id="pcp_id" name="pcp_id" placeholder="Physician ID.." type="number" min="1">
			<select class="form-control" name="docs">
			  <option selected='true' style='display:none;'>MD Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT physician_id, name FROM Physician";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['physician_id']. " ".$row['name']."</option>";
				}
			  ?>
			</select> 
		  </div>
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-8">
           <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </div>
   	</form>
	<form action="Physician.php" method="post" id="Physician">
      <div class="mdInfo">
        <label class="col-sm-3 control-label">Physician Information:</label>
        <div class="col-sm-3">
	      <input class="form-control" id="name" name="name" placeholder="Name" type="text">
          <input class="form-control" id="npi" name="npi" placeholder="NPI No." type="number">
          <input class="form-control" id="license" name="license" placeholder="License No." type="number">
          <input class="form-control" id="pt_id" name="pt_id" placeholder="Patient ID" type="number">
		  <select class="form-control" name="pts">
		    <option selected='true' style='display:none;'>Patient Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT patient_id, fname, lname FROM Patient";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['patient_id']. " ".$row['fname']. " ".$row['lname']."</option>";
				}
			  ?>
		  </select> 
	    </div>
	  </div>
	<div class="form-group">
      <div class="col-sm-2 col-sm-offset-8">
       <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>
    </div>
    </form>
    <form action="Medication.php" method="post" id="Meds">
      <div class="meds">
          <label class="col-sm-3 control-label">Medications:</label>
          <div class="col-sm-3">
            <input class="form-control" id="name" name="name" placeholder="Name.." type="text">
            <input class="form-control" id="strength" name="strength" placeholder="Strength (No units).." type="number">
            <input class="form-control" id="quantity" name="quantity" placeholder="Quantity.." type="number">
          </div>
      </div>
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-8">
           <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </div>
    </form>
	 <form action="Adverse.php" method="post" id="Adverse">
      <div class="ptInfo">
          <label class="col-sm-3 control-label">Adverse Effects:</label>
          <div class="col-sm-3">
            <input class="form-control" id="severity" name="severity" placeholder="Severity.." type="text">
            <input class="form-control" id="description" name="description" placeholder="Description.." type="text">
            <input class="form-control" id="med_id" name="med_id" placeholder="Medication ID.." type="number">
            <input class="form-control" id="pt_id" name="pt_id" placeholder="Patient ID.." type="number">
			<select class="form-control" name="pts">
			  <option selected='true' style='display:none;'>Patient Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT patient_id, fname, lname FROM Patient";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['patient_id']. " ".$row['fname']. " ".$row['lname']."</option>";
				}
			  ?>
			</select> 
          </div>
      </div>
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-8">
           <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </div>
    </form>
	<form action="delete.php" method="post" id="delete">
      <div class="delete">
        <label class="col-sm-3 control-label">Delete Data:</label>
        <div class="col-sm-3">
	      <input class="form-control" id="ptID" name="ptID" placeholder="Patient ID" type="number">
		  <select class="form-control" name="pt">
		    <option selected='true' style='display:none;'>Patient Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT patient_id, fname, lname FROM Patient";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['patient_id']." ".$row['fname']." ".$row['lname']. "</option>";
				}
			  ?>
		  </select> 
          <input class="form-control" id="mdID" name="mdID" placeholder="Physician ID" type="number">
		  <select class="form-control" name="md">
		    <option selected='true' style='display:none;'>Physician Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT physician_id, name FROM Physician";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['physician_id']. " ".$row['name']. "</option>";
				}
			  ?>
		  </select> 
          <input class="form-control" id="medID" name="medID" placeholder="Medication ID" type="number">
		  <select class="form-control" name="med">
		    <option selected='true' style='display:none;'>Medication Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT med_id, name FROM Adverse_Effect";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['med_id']. " ".$row['name']. "</option>";
				}
			  ?>
		  </select> 
          <input class="form-control" id="aeID" name="aeID" placeholder="Adverse Effect ID" type="number">
		  <select class="form-control" name="ae">
		    <option selected='true' style='display:none;'>Adverse Effect Reference. Input value above!</option>
		      <?php 
				$sql = "SELECT ae_id, description FROM Adverse_Effect";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_array($result)){
					echo "<option value=\"owner1\">" . $row['ae_id']. " ".$row['description']. "</option>";
				}
			  ?>
		  </select> 
	    </div>
	  </div>
	<div class="form-group">
      <div class="col-sm-2 col-sm-offset-8">
       <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>
    </div>
    </form>
	<form action="displayPT.php"/>
	  <div class="col-md-4 text-center">
		<div class="pull-left">
		  <button type="submit" class="btn btn-danger btn-block">Show Patients</button>
		</div>
	  </div>
	</form>	
	<form action="displayAE.php"/>
	  <div class="col-md-4 text-center">
		<div class="pull-left">
		  <button type="submit" class="btn btn-danger btn-block">Show Adverse Effects</button>
		</div>
	  </div>
	</form>
	<form action="displayMD.php"/>
	  <div class="col-md-4 text-center">
		<div class="pull-right">
		  <button type="submit" class="btn btn-danger btn-block">Show Physicians</button>
		</div>
	  </div>
	</form>
	<form action="displayMed.php"/>
	  <div class="col-sm-8 center-block text-center">
		<div class="pull-right">
		  <button type="submit" class="btn btn-danger btn-block">Show Medications</button>
		</div>
	  </div>
	</form>
</div>
  </body>
</html>