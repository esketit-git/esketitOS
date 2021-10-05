<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
          $screenshot1 = test_input($_POST["screenshot1"]);
          $screenshot2 = test_input($_POST["screenshot2"]);
          $screenshot3 = test_input($_POST["screenshot3"]);
          $screenshot4 = test_input($_POST["screenshot4"]);
          $screenshot5 = test_input($_POST["screenshot5"]);
          $screenshot6 = test_input($_POST["screenshot6"]);
          $price = test_input($_POST["price"]);
          $releasedate = test_input($_POST["releasedate"]);
          $agree = test_input($_POST["agree"]);
          $approved=0;
        
    	//insert into database
    	$hostname = "localhost";
    	$username = "esketit_software_store_admin";
    	$password = "GruIByeqf4e9AxztKiSE";
    	$db = "esketit_software_store";
    	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

			if ($dbconnect->connect_error) {
  		die("Database connection failed: " . $dbconnect->connect_error);
			}
			
$query = "INSERT INTO `programs` (`author`, `tokenname`, `softwaredescription`, `whatsnew`, `version`, `company`, `companydescription`, `category`, `homepage`, `contact`, `filename`, `foldername`, `ext`, `icon`, `titleimage`, `ss1`, `ss2`, `ss3`, `ss4`, `ss5`, `ss6`, `price`, `releasedate`, `agree`, `approved`) VALUES
('$author', '$tokenname', '$softwaredescription', '$whatsnew', '$version', '$company', '$companydescription', '$category', '$homepage', '$contact', '$filename', '$foldername', '$ext', '$icon', '$titleimage', '$screenshot1', '$screenshot2', '$screenshot3', '$screenshot4', '$screenshot5', '$screenshot6', '$price', '$releasedate', '$agree', '0')";
			
			 if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred when submitting your software.');
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

<p>All software must be open source.</p>

 		  <form method="post" action="addtoken.php">
 		
 <div class="row">
  <div class="column">
  
      <input type="text" id="author" name="author" placeholder="name of author" required><br />
  		<input type="text" id="tokenname" name="tokenname" placeholder="name of software" required><br />
  		<textarea id="softwaredescription" name="softwaredescription" placeholder="description of software" required></textarea><br />
			<input type="text" id="whatsnew" name="whatsnew" placeholder="what is new in the version" required><br />
  		<input type="text" id="version" name="version" placeholder="what version # is it" required><br />  		
  		<input type="text" id="company" name="company" placeholder="name of company" required><br />
  		<textarea id="companydescription" name="companydescription" placeholder="description of company" required></textarea><br />
  		<input type="text" id="category" name="category" placeholder="category" required><br />
  		<input type="text" id="homepage" name="homepage" placeholder="homepage https://" required><br />
    	<input type="text" id="contact" name="contact" placeholder="contact email address @" required><br />
  
	</div>
  <div class="column">
  
			<input type="text" id="filename" name="filename" placeholder="filename" required><br />
			<input type="text" id="foldername" name="foldername" placeholder="foldername" required><br />
			<input type="text" id="ext" name="ext" placeholder="ext" required><br />
  		<input type="text" id="icon" name="icon" placeholder="icon (48x48) (.png)" required><br> 
  		<input type="text" id="titleimage" name="titleimage" placeholder="title image" required><br>  
  		<input type="text" id="screenshot1" name="screenshot1" placeholder="screenshot 1/6" required><br />
  		<input type="text" id="screenshot2" name="screenshot2" placeholder="screenshot 2/6" required><br />
  		<input type="text" id="screenshot3" name="screenshot3" placeholder="screenshot 3/6" required><br />
  		<input type="text" id="screenshot4" name="screenshot4" placeholder="screenshot 4/6" required><br />
  		<input type="text" id="screenshot5" name="screenshot5" placeholder="screenshot 5/6" required><br />
  		<input type="text" id="screenshot6" name="screenshot6" placeholder="screenshot 6/6" required><br />
  		<input type="text" id="price" name="price" placeholder="price" required><br />
  		<input type="text" id="releasedate" name="releasedate" placeholder="release date 1/1/2021" required><br />
  		<input type="text" id="agree" name="agree" placeholder="agree to conditions, yes or no" required><br />
  		<p>
  		Your software is audited to ensure security and safety to end users. Do not program your software
  		in such a way that it must communicate over the network with foreign servers.
  		
  		Any programs that need to communicate with servers over the internet cannot be approved. Programs
  		that make calls to the system cannot be approved. Programs that use functions out of safe-mode setting
  		cannot be approved. Ambitious programs can request sever hosting on esketit servers or require core development. All 
  		software must be open source and only made accessible from esketit servers after audit. A list of suspect functions are
  		found <a href="https://gist.github.com/mccabe615/b0907514d34b2de088c4996933ea1720#file-phpdangerousfuncs-md">here</a>. This 			audit take some time, be patient and problem code is communicated. Any questions or queries about this subject are welcome.
  		</p> 
  		
  		<input type="submit" value="Add Software To Token Store" style="padding:20px; font-family: sans-serif; font-size: 20px">

  </div>
</div> 

		</form>

</body>
</html>
