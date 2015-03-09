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

      $sql = "SELECT fname, lname, dob, phone, house, street_name, town, pcp_id FROM Patient";
      $result = $mysqli->query($sql);

      if($result->num_rows > 0) {
      	echo "<table border='1'><tr><th>Last</th><th></th><th></th><th>First</th><th></th><th></th><th>DOB</th><th></th><th></th><th>House #</th><th></th><th></th>
              <th>Street</th><th></th><th></th><th>Town</th><th></th><th></th><th>Phone</th><th></th><th></th><th>PCP ID</th></tr>";
      	while($row = $result->fetch_assoc()) {
      		echo "<tr><td>".$row["lname"]."</td><td></td><td></td><td>".$row["fname"]."</td><td></td><td></td><td>".$row["dob"]."</td><td></td><td></td><td>"
               .$row["house"]."</td><td></td><td></td><td>".$row["street_name"]."</td><td></td><td></td><td>".$row["town"]."</td><td></td><td></td><td>"
		       .$row["phone"]."</td><td></td><td></td><td>".$row["pcp_id"]."</td></tr>";
      	}
      	echo "</table>";
      }

      $mysqli->close();

      ?>
    </div>
  <div class="col-md-4 text-center">
  <a href="index.php">Click here to return to the main page.</a>
  </div>
</body>
</html>