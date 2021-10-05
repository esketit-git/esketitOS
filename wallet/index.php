<?php

if (empty($un))	$un = $_POST['un'];
if (empty($pw)) $pw = $_POST['pw'];
if (empty($zid)) $zid = $_POST['zid'];

//redo the login with the supplied username and password
$tmp = dirname(__FILE__, 2); //4 dirs up from the location of this file is the db
$loginphp = $tmp."/terminals/php/login.php";

		require_once($loginphp);

		if ($access_or_denied != "NNHbHozQikWmU4YheAWW") {
		
		  echo '<start><html><head></head><body><meta http-equiv="refresh" content="1;url=index.php" /></body></html>';
			die(); exit();
		
		} //Do the login check again and only display the page if ok.


?>

<start>

			<input type="hidden" name="un" value="<?=$un?>">
			<input type="hidden" name="pw" value="<?=$pw?>">
			<input type="hidden" name="zid" value="<?=$zid?>">

<?php

	if ($data['0']['a'] == 1) {
	
		echo"<b>Welcome ROOT User</b>";
	
	
	
/************************************************/
/************************************************/
/************************************************/
/************************************************/	
	//To make commands out you need to...
/************************************************/
$tmp = dirname(__FILE__,3);
$rpcpath = $tmp."/sys/rpc.php"; 

	include_once($rpcpath); //make sure path to rpcconf is correct
		
	  try { //Check if daemon is on
          $res = $bitcoin->uptime();
          echo "<p>Core Uptime = "; print_r($res); echo "s</p>"; //debug
    } catch(Exception $e) {
    
 	   exec("pgrep bitcoind", $output, $return);
				if ($return == 0) echo "<p>Core Status: Core is running but uptime not returned, it may be in the process of starting.</p>";
			  else echo "<p>Core Status: Core is not running.</p>"; //debug
   }
    
			/*     
				try {
	    		$bitcoin_wallet_management = $bitcoin_instance->wallet->management; //create wallet
	    		$res = $bitcoin_wallet_management->create($username, false, false); //return confirmation
		    } catch(Exception $e) {
		      echo 'Message: ' .$e->getMessage(). '. Check daemon running, RPC username/password identical, firewall exception and ports forwarded';
		      die();
		    }
		   */

?>

<script>

		var base = window.location.toString().split("?")[0].replace(/[^\/]+$/,"")

/*********************************

    Administration Options

**********************************/
		
$(document).ready(function() {

		$('input:checkbox').change(function(e) {
			e.preventDefault();

				zid=$('#zid').val();
	
				var value = $(this).attr('id');
				var isChecked = $(this).is(":checked") ? 1:0; 
				//alert(value + isChecked)

						var url = base + 'php/savedb.php';				

			$.ajax({
   				url:url,
   				type: 'POST',
   					data: {
   										type:'3',
   										zid:zid,
   										value:value,
   										state:isChecked
   					},
   						success: function(response){
			
   					} 			
   		});

		});
});
</script>

<script>

/*********************************

            Add User 

*********************************/

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['delete_user'])) {
        // delete user button is clicked
        
        echo "<start>FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
        
    } 
    
   /* else if (isset($_POST['button_save'])) {
        // save button is clicked
    } 
    
    else if (isset($_POST['button_delete'])) {
       // delete button is clicked
    } 
    
    else {
        // display error e.g. invalid form submission or access denied
    } */
}
?>


/*
			$(document).ready(function() {
			
				$('#add_user').on('submit',function(e) {
				  e.preventDefault();
				  
     

					var fn = $("#fname").val();
					var un = $("#uname").val();
          var pw = $("#pword").val();
          var em = $("#email").val();
          var id = $("#id").val();

       var pwhash = sha3_512(pw);
       var unhash = sha3_512(un);

						var url = base + 'php/setup.php';

						    $.ajax({url:url,type:"POST",cache:false,data:{
						    		fn:fn,
                    un:unhash,
                    pw:pwhash,
                    em:em,
                    id:id
                }, success: function(result) {

                						if (result.includes("NNHbHozQikWmU4YheAWW")) {

																	$('#div-to-refresh').html(result);									
																	alert("dddddddddddddddeeeeeeeeeeeeeeeeeeeeee")

                            } else {
                            					alert ("Error: " + result + ". Account was not created.")
                            }
                            
               } //function-result
					}); //ajax-post
				}); //root-setup-button
			}); //document.ready

*/
</script>

<script>

/*********************************

          Add Wallet 

/*********************************/
/*
			$(document).ready(function() {
			
				$('#add_wallet').on('submit',function(e) {
				  e.preventDefault();
				  
				  
					var fn = $("#wname1").val();
					var un = $("#id").val();
          var pw = $("#pword").val();

       var pwhash = sha3_512(pw);
       var unhash = sha3_512(un);

						var url = base + 'php/setup.php';

						    $.ajax({url:url,type:"POST",cache:false,data:{
						    		fn:fn,
                    user:user,
                    pw:pw
                }, success: function(result) {
                
                						if (result.includes("NNHbHozQikWmU4YheAWW")) {
                    									alert ("New wallet is made and assigned.")
                            } else {
                            					alert ("Error: " + result + ". New wallet was not made.")
                            }
                            
               } //function-result
					}); //ajax-post
				}); //root-setup-button
			}); //document.ready
*/
</script>

<script>

/*********************************
    
         Deactive User 
     
*********************************/
/*
			$(document).ready(function() {
			
				$('#add_wallet').on('submit',function(e) {
				  e.preventDefault();
				  
					var fn = $("#wname1").val();
					var un = $("#id").val();
          var pw = $("#pword").val();

       var pwhash = sha3_512(pw);
       var unhash = sha3_512(un);

						var url = base + 'php/setup.php';

						    $.ajax({url:url,type:"POST",cache:false,data:{
						    		fn:fn,
                    user:user,
                    pw:pw
                }, success: function(result) {
                
                						if (result.includes("NNHbHozQikWmU4YheAWW")) {
                    									alert ("New wallet is made and assigned.")
                            } else {
                            					alert ("Error: " + result + ". New wallet was not made.")
                            }
                            
               } //function-result
					}); //ajax-post
				}); //root-setup-button
			}); //document.ready
*/
</script>

<script>
/*
$(document).ready(function(){
	  $('.delete_user').click(function(){
	  
	  	alert("VVVV");
	  
	  	var fn2 = $(this).attr("name");
	  	
				zid=$('#zid').val();
				id=$('#id').val();
				un=$('#un').val();
				pw=$('#pw').val();
				
			
	  
			  		if (confirm('Confirm to delete user account ID: ' + fn2 + '\nThis action cannot be undone.')) {
					 						 		
 					 										$.ajax({
   																url: 'php/savedb.php',
   																type: 'POST',
   																	data: {
   																						type:'4',
   																						id:fn2,
   																						un:un,
   																						pw:pw
   																	},
   				
   																			success: function(response){
											alert(response);
 					 		    															 $('#div-to-refresh').html(response).delay(1000);
 					 	
																				}
															});
 					
 					 		
						} else {
  						// Do nothing!
						}
	  });
	});
*/
</script>

<script>
/*
	$(document).ready(function(){
	  $('.delete_wall').click(function(){
	  
	  	var fn2 = $(this).attr("name");
	  	
				zid=$('#zid').val();
				id=$('#id').val();
				un=$('#un').val();
				pw=$('#pw').val();
				
				
	  	
	  
			  		if (confirm('Confirm to delete wallet for account ID: ' + fn2 + '\nThis action cannot be undone.')) {
					 						 		
 					 										$.ajax({
   																url: 'php/savedb.php',
   																type: 'POST',
   																	data: {
   																						type:'5',
   																						zid:zid,
   																						tab:tab_focus
   																				//		displayname:displayname,
   																				//		foldername:foldername,
   																				//		ext:ext
   																	},
   				
   																			success: function(response){
											alert(response);
 					 		    															 $('#div-to-refresh').html(response).delay(1000);
 					 	
																				}
															});
 					
 					 		
						} else {
  						// Do nothing!
						}
	  });
	});
*/
</script>

<?php

//Get value of checkboxes
$tmp = dirname(__FILE__, 3); //4 dirs up from the location of this file is the db
$dir = $tmp."/sys";
$db2 = $dir."/z.db";

						$db = new SQLite3($db2);
 		       	$res = $db->query("SELECT c,d FROM z WHERE z='$zid' AND type='2'"); 
 		       	
 		       	//type 1 = installed applications
 		       	//a1 the name of the installed application
 		       	//a2 the default file to load such as index.php
 		       	//a3 the name of the icon to display only icon.png 48x48 is allowed
 		       	//a4 tooltip description of the application
 		       	
 		       	//Create array to keep all results
            $ck=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
                    //insert row into array
              		array_push($ck, $row);
            }
			
			echo "<p>You should only use root user for systems administration and not to manage the enterprise, the first account you should make is the main account. Read documentation for sample diagrams of an enterprise setup.</p>";
			
//List all user and their wallets, user, wallets, performance

$tmp = dirname(__FILE__, 3); // up 4 from current directory
		$db = $tmp."/sys/x.db";
		$db1 = new SQLite3($db);

$code = file_get_contents($db); //Get the encrypted file into a string.
       			 $ivdec = hex2bin($iv); //$ivdec = base64_decode($iv);
       			 
				  //check that file is indeed encrypted      
    		  if (($code[0] != "S") || 
    		      ($code[1] != "Q") ||
    		      ($code[2] != "L") ||
    		      ($code[3] != "i") ||
    		      ($code[4] != "t") ||
    		      ($code[5] != "e"))  {

      						$code = encrypt_decrypt('decrypt', $code, $key, $ivdec);//Decrypt the encrypted string.
									file_put_contents($db, $code); //return the ecrypted string to file.

      		}

 	$res = $db1->query("SELECT * FROM x");
			
 		       	$root2=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($root2, $row);
            }
            
?>

			<input type="hidden" name="zid" id="zid" value="<?=$zid?>"> 
    	<input type="hidden" name="id" id="id" value="<?=$id?>">
    	<input type="hidden" name="un" id="un" value="<?=$un?>"> 
    	<input type="hidden" name="pw" id="pw" value="<?=$pw?>">


<table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

	<table style="width: 100%">
		<tr style="font-size: 10px; background-color: #c0c0c0; text-align: center">
			<td>Priv</td>
			<td>Rank</td>
			<td>Name</td>
			<td>Email</td>
			<td>User</td>
			<td>Pass</td>
			<td>Actions</td>
		</tr>

<div id="div-to-refresh">
	
<?php

	
	for ($i = 0; $i < count($root2); $i++) {
echo '
	<tr>
		<td style="text-align: center">'.$root2[$i]['a'].'</td>
		<td style="padding-left: 10px">'.$root2[$i]['id'].'</td>
		<td style="padding-left: 10px">'.$root2[$i]['b'].'</td>
		<td style="padding-left: 10px">'.$root2[$i]['c'].'</td>
<td style="padding-left: 10px"><div style="white-space: nowrap; width: 70px; overflow: hidden; text-overflow: ellipsis">'.$root2[$i]['d'].'</div></td>
		<td style="padding-left: 10px"><div style="white-space: nowrap; width: 70px; overflow: hidden; text-overflow: ellipsis">'.$root2[$i]['e'].'</div></td>
	  <td style="text-align: center">
	  
	  							<form method="post" action="'.$_SERVER['PHP_SELF'].'">
	  										<input type="hidden" name="un" value="'.$un.'">
												<input type="hidden" name="pw" value="'.$pw.'">
												<input type="hidden" name="zid" value="'.$zid.'">
   											<input type="hidden" name="name" value="'.$root2[$i]['id'].'"><br>
   											<input type="submit" name="delete_user" value=" x "><br>
									</form>
	  
	  <!-- <img src="../wallet/images/delete.png" title="delete user"> -->

		</td>
	</tr>
	
	<!-- grab the wallets for the user --><tr><td colspan="6" style="padding: 10px"><table style="width: 25%; margin-left: 55%"><tr style="font-size: 10px; background-color: #c0c0c0; text-align: center"><td>Wallet Name</td><td>Pass</td><td>&nbsp;Actions&nbsp;</td>';
	
			$res2 = $db1->query("SELECT * FROM wallets WHERE a='".$root2[$i]['z']."'");
			
 		       //	$wal=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res2->fetchArray(1)) {
              	//print_r($row);
              	
              	echo "<tr><td style='padding-left: 10px'>".$row['b']."</td><td style='padding-left: 10px'><div style='white-space: nowrap; width: 70px; overflow: hidden; text-overflow: ellipsis'>".$row['c']."</div></td>
              			<td style='text-align: center'><button class='delete_wall' name='".$row['b']."' value='".$root2[$i]['id']."'><img src='../wallet/images/delete.png' title='delete wallet'></button></td></tr>";
              	
              	//	array_push($wal, $row);
            }
            
    
    echo "</table>";
            
    
} ?>

</div>

		</td></tr></table>

</td></tr></table>


<!------------------------------------------------------------------------>
													
                          <!-- Add Wallet -->

<!------------------------------------------------------------------------>
		
<?php											
			
echo '<br /><table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

			<p><b>Assign Wallet To User</b></p>

	<form id="add_wallet" style="margin-left: 25%">
		<input id="id" type="hidden" value="<?php echo $id; ?>" />
		<p><input id="wname1" type="text" placeholder="Enter a wallet name #1" maxlength="128" minlength="3" required /></p>';

			$tmp = dirname(__FILE__, 3); // up 4 from current directory
			$db = $tmp."/sys/x.db";
			$db1 = new SQLite3($db);

 		       	$res = $db1->query("SELECT * FROM x"); 
 		       	
 		       	//$users=array();

echo '<p>Rank: <select id="user">';

	       	$wall=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($wall, $row);
              		
              		echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';
            }

?>
								
		</select></p>
										
	     <input type="submit" id="addwallet-button" value="ADD WALLET &#9997;">
	</form>
	
	</td></tr></table>
	
	
<!------------------------------------------------------------------------>
													
													<!-- Add User -->
													
<!------------------------------------------------------------------------>


<br /><table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

			<p><b>Add User</b></p>
			
	<form id="add_user" style="margin-left: 25%">
		<input id="id" type="hidden" value="<?php echo $id; ?>" />
		<p><input id="fname" type="text" placeholder="Enter full name &#128100;" maxlength="128" minlength="3" required /></p>
		<p><input id="uname" type="text" placeholder="Enter a username &#128101;" maxlength="128" minlength="3" required /></p>
		<p><input id="email" type="email" placeholder="Enter a valid email address &#64;" maxlength="128" minlength="5" required /></p>
		<p><input id="pword" type="password" placeholder="Password ****" maxlength="128" minlength="8" required /></p>
       <input type="submit" id="setup-button" value="ADD USER &#9997;">
	</form>

	</td></tr></table>


<!----------------------------------------------------------------------->
									<!-- Wallet Programmes -->
<!----------------------------------------------------------------------->


<br /><table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

			<p><b>Wallet Programmes&nbsp;</b><small>(basically banking features such as scheduled payments, recurring payments, plus crypto specific programmes.)</small></p>

				<form action="/action_page.php">
  					
					<table style="width: 50%; margin-left: 20%">

						<tr><td><label for="user">Send At Time Each Day:</label></td>
                <td>	<select id="user">
  											<option value="volvo">Wallet 1</option>
  											<option value="saab">Saab</option>
  											<option value="opel">Opel</option>
  											<option value="audi">Audi</option>
											</select>
								</td>
								 <td>	<select id="user">
  											<option value="volvo">Wallet 2</option>
  											<option value="saab">Saab</option>
  											<option value="opel">Opel</option>
  											<option value="audi">Audi</option>
											</select>
								</td>
								<td>&nbsp;</td><td><input type="submit" value="Submit"></td>
				
					</tr></table>	
				
				</form>
				
				<br />
				
				<form action="/action_page.php">
  					
					<table style="width: 50%; margin-left: 20%">

						<tr><td><label for="user">Make Wallet Send Only:</label></td>
                <td>	<select id="user">
  											<option value="volvo">Wallet 1</option>
  											<option value="saab">Saab</option>
  											<option value="opel">Opel</option>
  											<option value="audi">Audi</option>
											</select>
								</td>

								<td>&nbsp;</td><td><input type="submit" value="Submit"></td>
				
					</tr></table>	
				
				</form>

	</td></tr></table>


<!------------------------------------------------------------------------>
									<!-- Administration Options -->
<!------------------------------------------------------------------------>


<br /><table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>
			<b>Administration Options</b>
					<table style="padding: 20px">
					<tr><td>
						<label for="mkaccnts">
								Root allocates accounts? (users have no permission to make new accounts on the system)</label>  
					</td><td>
					
								<input type="checkbox" id="mkaccnts" name="mkaccnts" style="width:24px; height:24px"
								
											<?php			if ($ck[0]['c'] == 1) echo "checked";				?>																				

	></td></tr><tr><td>
					
					<label for="mkwallets">
							Root allocates wallets? (users have no permission to make new wallets in their accounts)</label>
					</td><td>
					 
								<input type="checkbox" id="mkwallets" name="mkwallets" style="width:24px; height:24px"
								
											<?php			if ($ck[0]['d'] == 1) echo "checked";				?>

	></td></tr><tr><td colspan="2" style="padding-top: 20px">Perform routine manual backups of the directory named "users" and manually write down all usernames and passwords used and store in a safe place.</td></tr></table> 
			
		</td></tr></table>

<?php
						try { //Check if daemon is on
  		      	  $res = $bitcoin->listwallets();
  		      	  echo "Wallets = "; print_r($res); echo "\n"; //debug
  	  			} catch(Exception $e) {
 								//echo 'Message: ' .$e->getMessage();
  		 					//die();
  	  			}	
		
	} else {
	
			echo "@@@@@@@@@@@@@@@@@@";
	
	}

?>
