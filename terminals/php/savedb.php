<?php

$tmp = dirname(__FILE__, 4); // up 4 from current directory
$dir = $tmp."/sys";  //location of systems directory
$rpcpath = $tmp."/sys/rpc.php"; //location of rpc
require_once($rpcpath); //rpc auth creditials for running system commands

$type = $_POST['type'];
$zid = $_POST['zid'];
$tab = $_POST['tab'];

/***********************************
  Save tab in foccus
************************************/

		if ($type == '2') { //type2 saves the tab in focus

					$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db		  	
					$dir = $tmp."/sys";
					$db2 = $dir."/z.db";
					$db = new SQLite3($db2);

							$query = $db->exec("UPDATE z SET b='$tab' WHERE z='$zid' AND type='$type'");
							
										$db->close();
		}
		
/***********************************
  Save installed applilications
************************************/

		if ($type == '1') { //type 1 saves the tab

//save data to database, clear session. form will submit data

//type1 of expansion table
$dn = $_POST['displayname'];
$fn = $_POST['foldername'];
$ext = $_POST['ext'];

//update the tabs into table

	$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db		  	
	$dir = $tmp."/sys";
	$db2file = $dir."/z.db";
	$db = new SQLite3($db2file);
	 

 //echo $db2file;//system("ls > output");
 	        
		    
				//$query = $db->exec("UPDATE z SET a='$tab' WHERE a='$tab'");
				$query = $db->exec("UPDATE z SET b='$tab' WHERE z='$zid' AND type='2'");
						
				$query = $db->exec("UPDATE z SET b='$dn' WHERE a='$tab' AND z='$zid'");

				$query = $db->exec("UPDATE z SET c='$fn' WHERE a='$tab' AND z='$zid'");
		
				$query = $db->exec("UPDATE z SET d='$ext' WHERE a='$tab' AND z='$zid'");

			$db->close();
	}
	
/****************************************
  Save wallet app checkbox status
*****************************************/

	if ($type == '3') {

					$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db		  	
					$dir = $tmp."/sys";
					$db2 = $dir."/z.db";
					$db = new SQLite3($db2);


			$state = $_POST['state'];

				if ($_POST['value'] == "mkaccnts") 
 							$query = $db->exec("UPDATE z SET c='$state' WHERE z='$zid' AND type='2' AND a='1000'");

 				if ($_POST['value'] == "mkwallets")
							$query = $db->exec("UPDATE z SET d='$state' WHERE z='$zid' AND type='2' AND a='1000'");

		
					$db->close();
		
		}
	

	if ($type == '4') { //delete user
	
	
			$type = $_POST['type'];
			$id = $_POST['id'];
			$un = $_POST['un'];
			$pw = $_POST['pw'];
			$tab = $_POST['tab'];
			//$iv;
			//$key;   
			
	
				$tmp = dirname(__FILE__, 4); // up 4 from current directory
		 		$db = $tmp."/sys/x.db";
				$r0 = new SQLite3($db);
	
	
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
      					file_put_contents($db, $code);
      		}

		
							$sql = "UPDATE x SET y='0' WHERE id='$id'";
		         	$res = $r0->exec($sql);
		         						
							
							$sql = "SELECT * FROM x WHERE y != 0";
		         	$res = $r0->query($sql);
		         	
 		       	
 		       	$root2=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($root2, $row);
            }
							

	
	}
	
	if ($type == '5') { //delete user
	
	
	echo "<start>".$iv.$key." <->BBBBBBBBBBBBBB";
	
	
	}
	
	if ($type == '6') { //Add user
	
	
	echo "<start>".$iv.$key." <->BBBBBBBBBBBBBBv";
	
	
	}

	if ($type == '7') { //Add wallet
	
	
	
	echo "<start>".$iv.$key." <->BBBBBBBBBBBBBffB";
	
	
	}
	
?>
