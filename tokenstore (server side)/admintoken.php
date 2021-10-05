 <?php
     	//insert into database
    	$hostname = "localhost";
    	$username = "esketit_software_store_admin";
    	$password = "GruIByeqf4e9AxztKiSE";
    	$db = "esketit_software_store";
    	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

// Create connection
$dbconnect = new mysqli($hostname, $username, $password, $db);
// Check connection
if ($dbconnect->connect_error) {
  die("Connection failed: " . $dbconnect->connect_error);
}

$sql = "SELECT id, tokenname FROM programs";
$result = $dbconnect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["tokenname"]. " <a href='admintokenedit.php?id=".$row['id']."'> Edit </a> <br>";
  }
} else {
  echo "0 results";
}
$dbconnect->close();
?> 
