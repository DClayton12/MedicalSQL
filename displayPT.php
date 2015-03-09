<!DOCTYPE html> 
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Clayton, Brancale CS340 Final</title>
  </head>
  <body>
    <div>
      <?php
      include "index.php";

      $sql = "SELECT patient_id, fname, lname, dob, phone, house, street_name, town FROM Patient";
      $result = $mysqli->query($sql);

      if($result->num_rows > 0) {
      	echo "<table border='1'><tr><th>Patient #</th><th></th><th></th><th>Last</th><th></th><th></th><th>First</th><th></th><th></th><th>DOB</th><th></th><th></th><th>House #</th><th></th><th></th>
              <th>Street</th><th></th><th></th><th>Town</th><th></th><th></th><th>Phone</th></tr>";
      	while($row = $result->fetch_assoc()) {
      		echo "<tr><td>".$row["patient_id"]."</td><td></td><td></td><td>".$row["lname"]."</td><td></td><td></td><td>".$row["fname"]."</td><td></td><td></td><td>".$row["dob"]."</td><td></td><td></td><td>"
               .$row["house"]."</td><td></td><td></td><td>".$row["street_name"]."</td><td></td><td></td><td>".$row["town"]."</td><td></td><td></td><td>"
		       .$row["phone"]."</td></tr>";
      	}
      	echo "</table>";
		echo " <div><a href='index.php'>Click here to return to the main page.</a></div>";
      }

      $mysqli->close();

      ?>
    </div>
</body>
</html>