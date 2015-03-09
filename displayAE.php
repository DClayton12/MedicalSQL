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

      $sql = "SELECT description, severity, med_id, pt_id FROM Adverse_Effect";
      $result = $mysqli->query($sql);

      if($result->num_rows > 0) {
      	echo "<table border='1'><tr><th>Description</th><th></th><th></th><th>Severity</th><th></th><th></th><th>Medication #</th><th></th><th></th><th>Patient #</th></tr>";
      	while($row = $result->fetch_assoc()) {
      		echo "<tr><td>".$row["description"]."</td><td></td><td></td><td>".$row["severity"]."</td><td></td><td></td><td>".$row["med_id"]."</td><td></td><td></td><td>"
               .$row["pt_id"]."</td>/tr>";
      	}
      	echo "</table>";
		echo " <div><a href='index.php'>Click here to return to the main page.</a></div>";
      }

      $mysqli->close();

      ?>
    </div>
</body>
</html>