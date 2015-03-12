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

      $sql = "SELECT name, strength, quantity FROM Medication";
      $result = $mysqli->query($sql);

      if($result->num_rows > 0) {
      	echo "<table border='1'><tr><th>Name</th><th></th><th></th><th>Strength</th><th></th><th></th><th>Quantity</th></tr>";
      	while($row = $result->fetch_assoc()) {
      		echo "<tr><td>".$row["name"]."</td><td></td><td></td><td>".$row["strength"]."</td><td></td><td></td><td>".$row["quantity"]."</td></tr>";
      	}
      	echo "</table>";
		echo " <div><a href='index.php'>Click here to return to the main page.</a></div>";
      }

      $mysqli->close();

      ?>
    </div>
</body>
</html>