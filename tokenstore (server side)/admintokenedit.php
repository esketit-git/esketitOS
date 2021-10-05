<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$id = $_POST["id"];

          $author = test_input($_POST["author"]);
          $tokenname = test_input($_POST["tokenname"]);
          $softwaredescription = test_input($_POST["softwaredescription"]);
          $whatsnew = test_input($_POST["whatsnew"]);
          $version = test_input($_POST["version"]);
          $company = test_input($_POST["company"]);
          $companydescription = test_input($_POST["companydescription"]);
          $category = test_input($_POST["category"]);
          $homepage = test_input($_POST["homepage"]);
          $contact = test_input($_POST["contact"]);
          $filename = test_input($_POST["filename"]);
          $foldername = test_input($_POST["foldername"]);
          $ext = test_input($_POST["ext"]);
          $icon = test_input($_POST["icon"]);
          $titleimage = test_input($_POST["titleimage"]);
          $ss1 = test_input($_POST["screenshot1"]);
          $ss2 = test_input($_POST["screenshot2"]);
          $ss3 = test_input($_POST["screenshot3"]);
          $ss4 = test_input($_POST["screenshot4"]);
          $ss5 = test_input($_POST["screenshot5"]);
          $ss6 = test_input($_POST["screenshot6"]);
          $price = test_input($_POST["price"]);
          $releasedate = test_input($_POST["releasedate"]);
          $agree = test_input($_POST["agree"]);
          $approved = test_input($_POST["approved"]);
        
    	//insert into database
    	$hostname = "localhost";
    	$username = "esketit_software_store_admin";
    	$password = "GruIByeqf4e9AxztKiSE";
    	$db = "esketit_software_store";
    	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

			if ($dbconnect->connect_error) {
  		die("Database connection failed: " . $dbconnect->connect_error);
			}

$query = "UPDATE programs SET author='$author', tokenname='$tokenname', softwaredescription='$softwaredescription', whatsnew='$whatsnew', version='$version', company='$company', companydescription='$companydescription', category='$category',  homepage='$homepage', contact='$contact', filename='$filename', foldername='$foldername', ext='$ext' icon='$icon', titleimage='$titleimage', ss1='$ss1', ss2='$ss2', ss3='$ss3', ss4='$ss4', ss5='$ss5', ss6='$ss6', price='$price', releasedate='$releasedate', agree='$agree', approved='$approved'  WHERE id='$id'";
	
			 if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred when submitting your software.' . $dbconnect -> error);
    	} else {
      	echo "Thanks for your review.";
    	}
    
} //form submit
      
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
?>

<?php
$id = $_GET['id'];

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

$sql = "SELECT * FROM programs WHERE id='".$id."'";
$result = $dbconnect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
  				$id = $row["id"];
          $author = $row["author"];
          $tokenname = $row["tokenname"];
          $softwaredescription = $row["softwaredescription"];
          $whatsnew = $row["whatsnew"];
          $version = $row["version"];
          $company = $row["company"];
          $companydescription = $row["companydescription"];
          $category = $row["category"];
          $homepage = $row["homepage"];
          $contact = $row["contact"];
          $filename = $row["filename"];
          $foldername = $row["foldername"];
          $ext = $row["ext"];
          $icon = $row["icon"];
          $titleimage = $row["titleimage"];
          $screenshot1 = $row["ss1"];
          $screenshot2 = $row["ss2"];
          $screenshot3 = $row["ss3"];
          $screenshot4 = $row["ss4"];
          $screenshot5 = $row["ss5"];
          $screenshot6 = $row["ss6"];
          $price = $row["price"];
          $releasedate = $row["releasedate"];
          $agree = $row["agree"];
          $approved = $row["approved"];
  
  }
} else {
  echo "0 results";
}
$dbconnect->close();

?>

<html>
<head>

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<style>

input[type=text] {
  padding:10px;
  margin:10px 0; // add top and bottom margin
}

input {
  width:400px;
}

textarea {
  width:400px;
  height: 150px;
  padding:10px;
  margin:10px 0; // add top and bottom margin
}

 .row {
  display: flex;
}

.column {
  flex: 50%;
  text-align: center;
}

p {
  text-align: justify;
  text-justify: inter-word;
  padding: 10px;
}

</style>

</head>
<body>

<p>Review and update software.</p>

 		  <form method="post" action="">
 		
 <div class="row">
  <div class="column">
  
     Id: <input type="text" id="id" name="id" value="<?=$id?>"><br />
     Author: <input type="text" id="author" name="author" value="<?=$author?>"><br />
  	Name:	<input type="text" id="tokenname" name="tokenname" value="<?=$tokenname?>"><br />
  	SW Descipt:	<textarea id="softwaredescription" name="softwaredescription"><?=$softwaredescription?></textarea><br />
		Whats New:	<input type="text" id="whatsnew" name="whatsnew" value="<?=$whatsnew?>"><br />
  	Version:	<input type="text" id="version" name="version" value="<?=$version?>"><br />  		
  	Company:	<input type="text" id="company" name="company" value="<?=$company?>"><br />
  	Company Descript:	<textarea id="companydescription" name="companydescription"><?=$companydescription?></textarea><br />
  	Category:	<input type="text" id="category" name="category" value="<?=$category?>"><br />
  	Homepage:	<input type="text" id="homepage" name="homepage" value="<?=$homepage?>"><br />
    Contact:	<input type="text" id="contact" name="contact" value="<?=$contact?>"><br />
  
	</div>
  <div class="column">
  
		Filename:	<input type="text" id="filename" name="filename" value="<?=$filename?>"><br />
		Foldername:	<input type="text" id="foldername" name="foldername" value="<?=$foldername?>"><br />
		Ext:	<input type="text" id="ext" name="ext" value="<?=$ext?>"><br />
  	Icon:	<input type="text" id="icon" name="icon" value="<?=$icon?>"><br> 
  	Titleimage:	<input type="text" id="titleimage" name="titleimage" value="<?=$titleimage?>"><br>  
  	ss1:	<input type="text" id="screenshot1" name="screenshot1" value="<?=$screenshot1?>"><br />
  	ss2:	<input type="text" id="screenshot2" name="screenshot2" value="<?=$screenshot2?>"><br />
  	ss3:	<input type="text" id="screenshot3" name="screenshot3" value="<?=$screenshot3?>"><br />
  	ss4:	<input type="text" id="screenshot4" name="screenshot4" value="<?=$screenshot4?>"><br />
  	ss5:	<input type="text" id="screenshot5" name="screenshot5" value="<?=$screenshot5?>"><br />
  	ss6:	<input type="text" id="screenshot6" name="screenshot6" value="<?=$screenshot6?>"><br />
  	Price:	<input type="text" id="price" name="price" value="<?=$price?>"><br />
  	Release Date:	<input type="text" id="releasedate" name="releasedate" value="<?=$releasedate?>"><br />
  	Agree:	<input type="text" id="agree" name="agree" value="<?=$agree?>"><br />
  	Approved:	<input type="text" id="approved" name="approved" value="<?=$approved?>"><br />
  		
  		<input type="submit" value="Admin Update Software" style="padding:20px; font-family: sans-serif; font-size: 20px">

<br />

<!--			<input type="submit" value="DELETE Software" style="padding:20px; font-family: sans-serif; font-size: 20px">  -->

  </div>
</div> 

		</form>

</body>
</html>
