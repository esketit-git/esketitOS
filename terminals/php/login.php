<?php
/* Disable empty session calls
   Ignore get requests */
/*if(!isset($_SESSION) ||
    empty($_SESSION) ||
    session_status() == PHP_SESSION_NONE ||
    session_id() == '') die();

Disable GET Requests
Disable sessions

//if(!isset($_SESSION)) exit the page
*/

//session_start();
$tmp = dirname(__FILE__, 4);
$rpcpath = $tmp."/sys/rpc.php";
include_once($rpcpath);

//initialization of variables set to 0 and no access
$un = "0";
$pw = "0";
//$arr[]=array("access"=>"2","u"=>$un);
//echo json_encode($arr);


//get the username and passord from ajax call login.js
$un = $_POST['un'];
$pw = $_POST['pw'];
$id = $_POST['id'];

//get rpc keys
//unencrypt the user database
//check for match
//return result

$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db
$dir = $tmp."/sys";
$db1 = $dir."/x.db";
$db2 = $dir."/z.db";

    
       $code = file_get_contents($db1); //Get the encrypted file into a string.
       $ivdec = hex2bin($iv); //$ivdec = base64_decode($iv);
      //check that file is indeed encrypted      
    		  if (($code[0] != "S") || 
    		      ($code[1] != "Q") ||
    		      ($code[2] != "L") ||
    		      ($code[3] != "i") ||
    		      ($code[4] != "t") ||
    		      ($code[5] != "e"))  {
      	
      					$code = encrypt_decrypt('decrypt', $code, $key, $ivdec);//Decrypt the encrypted string.
      					file_put_contents($db1, $code);
      		}

		  		
      		$db = new SQLite3($db1);
        	$res = $db->query("SELECT * FROM x WHERE d = '$un' AND e = '$pw'");

                  $data=array(); //Create array to keep all results

                  //fetch associated array (1 for SQLITE3_ASSOC)
                  while ($row = $res->fetchArray(1)) {
                    
                    	array_push($data, $row); //insert row into array
                    
                  }
 
						$db->close();
						
						print_r($data);
						
//Collect wallets before re-encrypt
//Grab the installed application list
						$db = new SQLite3($db1);
 		       	$res = $db->query("SELECT * FROM wallets"); 
 		       	
 		       	//type 1 = installed applications
 		       	//a1 the name of the installed application
 		       	//a2 the default file to load such as index.php
 		       	//a3 the name of the icon to display only icon.png 48x48 is allowed
 		       	//a4 tooltip description of the application
 		       	
 		       	//Create array to keep all results
            $wall=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
                    //insert row into array
              		array_push($wall, $row);
            }

print_r($wall); 
						
//Re-encrypt the database and out
      		 
    $code = file_get_contents($db1);
    $code = encrypt_decrypt('encrypt', $code, $key, $ivdec); //Encrypt the db.
           
    //echo $encrypted_code; //debug

    file_put_contents($db1, $code); //return the ecrypted string to file. 
					
						if (isset($data[0]['d'])) {
						
        	    $dbun = $data[0]['d'];
							$dbpw = $data[0]['e'];
						  $dbz = $data[0]['z'];


									if ($dbun == $un && $dbpw == $pw) { $access_or_denied = "NNHbHozQikWmU4YheAWW"; echo $access_or_denied; }
 									else { $access_or_denied = "0"; echo $access_or_denied; die(); }

						
										print_r($data);
						
								
						} else { $access_or_denied = "0"; echo $access_or_denied; die(); }
						
				


         
//type2

//grab all the data from db2 for the user
//type1

						//Grab the installed application list
						$db = new SQLite3($db2);
 		       	$res = $db->query("SELECT * FROM z WHERE z='$dbz' AND type='1'"); 
 		       	
 		       	//type 1 = installed applications
 		       	//a1 the name of the installed application
 		       	//a2 the default file to load such as index.php
 		       	//a3 the name of the icon to display only icon.png 48x48 is allowed
 		       	//a4 tooltip description of the application
 		       	
 		       	//Create array to keep all results
            $dat1=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
                    //insert row into array
              		array_push($dat1, $row);
            }

print_r($dat1);          
//type2

 		       	$res = $db->query("SELECT * FROM z WHERE z='$dbz' AND type='2'");
 		       	
 		       	$dat2=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($dat2, $row);
            }

//type 3

						$res = $db->query("SELECT * FROM z WHERE z='$dbz' AND type='3'");

 		       	$dat3=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($dat3, $row);
            }

//type3
 
 		       	$res = $db->query("SELECT * FROM z WHERE z='$dbz' AND type='4'");
 		       	
 		       	$dat4=array();

            //fetch associated array (1 for SQLITE3_ASSOC)
            while ($row = $res->fetchArray(1)) {
              		array_push($dat4, $row);
            }

            
 $db->close();


function encrypt_decrypt($action, $string, $secret_key, $secret_iv)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        //$secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
        //$secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = base64_decode($string);
            $output = openssl_decrypt($output, $encrypt_method, $key, 0, $iv);
				}
        return $output;
    }

?>

