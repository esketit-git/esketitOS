<!-- search db for software -->
<!-- comes in from esketit os -->

<?php
$search = $_POST['search'];
$id = $_POST['id'];
$zid = $_POST['zid'];
$un = $_POST['un'];
$pw = $_POST['pw'];

echo '<p style="font-size: 16px"><b>Results for: '.$search.'</b></p>';
?>

<script>
     $(function () {
	    $('.sw').on('click', function () {
	    
	    	
	        //var ex1 = $(this).val(); //get only the value attribute
	        //var swtitle = $(this).attr("name") //gets any attribute of your button
	        //var filename = $(this).attr("name") //gets any attribute of your button
	        var filename = $(this).attr("v1") //gets any attribute of your button
	        var foldername = $(this).attr("v2") //gets any attribute of your button
	        var swtitle = $(this).attr("v3") //gets any attribute of your button
	        var ext = $(this).attr("v4") //gets any attribute of your button
	        var zid = $('#zid').val();
	        var id = $('#id').val();
	        var un = $('#un').val();
	        var pw = $('#pw').val();
	        
         		$.ajax({url:"/tokenstore/index.php",type:"POST",data:{
         	
         	  zid : zid,
         	  id : id,
         	  un : un,
         	  pw : pw,
         	  swpath : filename,
         	  foldername : foldername,
         	  swtitle : swtitle,
         	  ext : ext

        	 }, success: function(result) {
        	 
        	 
        	 			//	submitform();

							 alert("Refresh is required to complete the installation.")
	
							 document.myform.submit();
	 
					
        	}
        }); 
    	});
		});

</script>

		<form name="myform" method="POST" action="interface.php">
    	<input type="hidden" id="zid" name="zid" value="<?=$zid?>" />
    	<input type="hidden" id="id" name="id" value="<?=$id?>" />
    	<input type="hidden" id="pw" name="pw" value="<?=$pw?>" />
    	<input type="hidden" id="un" name="un" value="<?=$un?>" />
		</form>
    
<style>

	#swborder {
  	border-radius: 0px;
  	border-style: groove;
  	border: 3px solid #777;
  	padding: 20px; 
  	width: 95%;
  	text-align: left
	}

</style>

<?php

	//do the search query
     	
	$hostname = "localhost";
	$username = "XXXXXXXXXXXXXXXXXXXXXXXXXXXX";
	$password = "XXXXXXXXXXXXXXXXXX";
	$db = "esketit_software_store";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

	// Create connection
	$dbconnect = new mysqli($hostname, $username, $password, $db);
	// Check connection
	if ($dbconnect->connect_error) {
	  die("Connection failed: " . $dbconnect->connect_error);
	}

	$sql = "SELECT * FROM programs WHERE softwaredescription LIKE '$search' OR tokenname LIKE '$search'";
	$result = $dbconnect->query($sql);

	//the results			
	if ($result->num_rows > 0) {

  	// output data of each row
  	while($row = $result->fetch_assoc()) {
  
  		echo "<center>";
				echo '<div id="swborder">';
					echo '<p>' . $row['coverpic'] . '</p>';
  				echo '<p>Name: ' . $row['tokenname'] . '</p>';
  				echo '<p>Description: ' . $row['softwaredescription'] . '</p>'; //price
  				//echo '<a href="https://esketit.org/tokenstore/repo/' . $row['filename'] . '">the Software as a html link</a>';
  				echo '<p>Install: <input type="button" class="sw" v1="' . $row['filename'] . '" v2="' . $row['foldername'] . '" v3="' . $row['tokenname'] . '" v4="' . $row['ext'] . '" value="INSTALL">';
  				echo '<p>Category: ' . $row['category'] . ' - ' . $row['author'] . ' - Version: ' . $row['version'] . '</p>';
  			echo '</div>';
  		 echo "</center>";
  	}
	} else {
  	echo "0 results";
	}
	$dbconnect->close();

/*request results from database
	$db = new SQLite3('apps.db');
	$sql = "SELECT * FROM apps";
	$result = $db->query($sql);
		while ($row = $result->fetchArray(SQLITE3_ASSOC)){
		 echo "<center>";
			echo '<div id="swborder">';
				echo '<p>' . $row['coverpic'] . '</p>';
  			echo '<p>Name: ' . $row['name'] . '</p>';
  			echo '<p>Description: ' . $row['description'] . '</p>'; //price
  			echo '<p>Install: <a href="' . $row['path'] . '">' . $row['path'] . '</a></p>';
  			echo '<p>Category: ' . $row['category'] . '</p>';
  		echo '</div>';
  	 echo "</center>";
		}	
	unset($db);
		//name of software, path of downloadfile, description, screenshots path */ 
?>

