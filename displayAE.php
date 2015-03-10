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

      $sql = "SELECT description, severity FROM Adverse_Effect";// WHERE ae_id = (SELECT patient_id FROM Patient)";
      $result = $mysqli->query($sql);

      if($result->num_rows > 0) {
      	echo "<table border='1'><tr><th>Description</th><th></th><th></th><th>Severity</th></tr>";
      	while($row = $result->fetch_assoc()) {
      		echo "<tr><td>".$row["description"]."</td><td></td><td></td><td>".$row["severity"]."</td></tr>";
      	}
      	echo "</table>";
		echo " <div><a href='index.php'>Click here to return to the main page.</a></div>";
      }

      $mysqli->close();

      ?>
    </div>
</body>
</html>