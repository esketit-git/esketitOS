<start>

<?php

  if (isset($_POST['zid'])) $zid = $_POST['zid'];
  if (isset($_POST['id'])) $id = $_POST['id'];
  if (isset($_POST['un'])) $un = $_POST['un'];
  if (isset($_POST['pw'])) $pw = $_POST['pw'];

?>


<!-- Step 1 provide a search facility -->

<div style="text-align: center; padding-top: 20px">
    <form id="searchdb"> <!-- uses ajax - action="https://esketit.org/tokenstore/search.php" -->
    			<input type="hidden" id="zid" name="zid" value="<?=$zid?>">
    			<input type="hidden" id="id" name="id" value="<?=$id?>">
    			<input type="hidden" id="un" name="un" value="<?=$un?>">
    			<input type="hidden" id="pw" name="pw" value="<?=$pw?>">
    	<input type="text" name="search" placeholder="Search for apps.." style="width: 85%; padding: 14px; font-size: 26px" required>
			<input type="submit" id="submit" name="search" value="&nbsp;&nbsp;&#128269;&nbsp;&nbsp;" style="padding: 14px; font-size: 26px"/>
		</form>
</div>
			
<div style="font-size:12px; text-align: center">(only install apps from this source. esketit.org runs checks, audits on an applications before listing, to eliminate or minimize security incidents)</div>

<!-- end search facility -->
<script>

$( document ).ready(function() {
	
		$('#searchdb').on('submit', function (e) {
			e.preventDefault();
         $.ajax({
           type: 'POST',
           url: 'https://esketit.org/tokenstore/search.php',
           data: $('#searchdb').serialize(),
              success: function (response) {
             		$("#main_software_store").html(response);
            	}
         });
     });
         
});
</script>

<div id="main_software_store">

		<!-- the div display the software -->	

</div>

<!-- Step two is click the link and grab the file -->

		  	
<?php

	if (isset($_POST['swpath'])) $swpath = $_POST['swpath'];
	if (isset($_POST['foldername'])) $foldername = $_POST['foldername'];
	if (isset($_POST['swtitle'])) $swtitle = $_POST['swtitle'];
	if (isset($_POST['ext'])) $ext = $_POST['ext']; else $ext = "php";
	if (isset($_POST['zid'])) $zid = $_POST['zid'];
	if (isset($_POST['id'])) $id = $_POST['id'];
	if (isset($_POST['un'])) $un = $_POST['un'];
	if (isset($_POST['pw'])) $pw = $_POST['pw'];
	

if (isset($swpath)) {

		set_time_limit(0);

		// File to save the contents to
		$fp = fopen ('repo/'.$swpath, 'w+');

		$url = "https://esketit.org/tokenstore/repo/".$swpath;

		// Here is the file we are downloading, replace spaces with %20
		$ch = curl_init(str_replace(" ","%20",$url));

		curl_setopt($ch, CURLOPT_TIMEOUT, 50);

		// give curl the file pointer so that it can write to it
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		$data2 = curl_exec($ch);//get curl response

		//done
		curl_close($ch);
		
		  //unzip and move to directory
  		system("unzip -o -qq repo/".$swpath." -d ../");
		
		  	//update the users database and add the application to the app console
		  	
		  	//get username password and iv
		  	//echo $t1." = ".$t2." = ".$t3;

		  	
	$tmp = dirname(__FILE__, 3); //4 dirs up from the location of this file is the db		  	
  $dir = $tmp."/sys";

				$filename = $dir."/z.db";
				
				//debug mechanism
				//$cmd = "echo ".$t2." > sex";
				//system($cmd);
		  				  	
		  	//insert new application into db.
		  	
				//echo $filename;
				$userdb = new SQLite3($filename); //$name $path $ext 
				$userdb->exec("INSERT INTO z(a, b, c, d, e, z, type)VALUES('x','$swtitle','$swpath','$foldername','$ext', '$zid', '3')");
				$userdb->close();


		  	//grab app installed list
		  	$userdb = new SQLite3($filename);	
		  	$result = $userdb->query("SELECT * FROM z WHERE type='3' AND z='$zid'");
		  	
		  	$appsarr=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $result->fetchArray(1)) {
                    //insert row into array
              array_push($appsarr, $row);
            }
            
            //print_r($dataII);
 
				$userdb->close();
		  	
		  	//update the div with the list
		  	
		  	//print_r($appsarr);
		  	
		  	echo '<form id="YourFormID" action="https://esketit.org"></form>';
		  	
}
 
?>
