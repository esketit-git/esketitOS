<?php

$tmp = dirname(__FILE__, 4); // up 4 from current directory
$dir = $tmp."/sys";  //location of systems directory
$rpcpath = $tmp."/sys/rpc.php"; //location of rpc
require_once($rpcpath); //rpc auth creditials for running system commands

/* Check if daemon is running *//* disable this to test script */  
    try {
          $r = $bitcoin->uptime();
        	//echo "Uptime = "; print_r($r); echo "\n"; //debug
    } catch(Exception $e) {
      		//echo 'Message: ' .$e->getMessage();
      		echo "Err 1: Core is not running. Check RPCAuth server side matches client side. Check firewall exception and ports forwarded.";
      		die();
    }


/*

	All data is held in sys/x.db using sqlite, the password is found in rpcconf.php
	rpcauth creditials are in rpcconf.php
	rpcauth creditials is in bitcoind.conf
	db creds is in rpcconf.php
	
	access permission to these file must be tight
	chmod 000
	chmod 400 or chmod 600


	All wallets are encrypted, this means send funds requires a password.
	
Understanding Security
--------

Access to the computer running this software can compromise the security. This includes IT dept. employees. This computer may be locked in server cage and passwords changed after each service.
	
Resourcing our project with funding means higher security out of the box.

Three Types Of Wallets
----------------------	

Receive Only Wallets
--------------------
		-> Only root can send
	Work wallets can receive funds only. The password are set by the root user and the wallet are programmed to send by the root user only. Employees cannot send with these wallets. This password is stored in rpcconf.php. The days takings go with these wallets into the main wallet.
  	
Send and Receive Wallets (with caveat)
--------------------------------------
     -> Root Issued (both root and employee know the send password)
     -> User Issue (root does not know the send password, only the user knows)
	A pay wages into employee wallet on the other hand must give the employee the ability to send. They have the right to send their pay to another wallet or to make purchases to service themselves. If the root issues the wallet to the employee, root must make it known to the employee that management knows the password to their wallet. Payroll might pay wages into a user issue wallet rather than a root issued.

Main Wallet
-----------
	Be aware, that unlike both these situations the main wallet password is not stored on the computer. The encrypted file itself is encrypted and decrypted with root user login creditials. The main wallet ought to be the most secure as the other wallets are operational wallets rather than storage wallets.

All of these passwords must be written down with a pen and on paper and stored in a safe place.


Check that root user exists on the system by existance of root setup file
which is deleted after root user is setup

	Create the root user, when you create the root user
  create the encrypt key and iv and pipe it out to rpcconf.php
  and encrypt the users database x.db
  subsequent access is decrypted and encrypted by rpc.conf creds
  which are changed periodically

	The root users main wallet is encrypted and only the root user can decrypt it.
  while all other wallets can be accessed if the rpcconf.php password is accessible.
  This means root user can access all wallets


Double check AJAX hack that root user is not being faked */

$fn = $_POST['fn'];
$un = $_POST['un'];
$pw = $_POST['pw'];
$em = $_POST['em'];
$id = $_POST['id'];

//$pwhash = hash('sha3-512',$pw);

$root = 0;

if (isset($_POST['root'])){
	if ($_POST['root'] == "1"){
				$root = TRUE;
					if (isset($_POST['gen_wallet']) && $_POST['gen_wallet'] == "1") $gen_wallet = TRUE; else $gen_wallet = FALSE;
	}
}

 //Databases - make if not exist
		$db = $tmp."/sys/x.db";
		$db2 = $tmp."/sys/z.db";
		$r0 = new SQLite3($db);
		$r1 = new SQLite3($db2);
		
if ($root == TRUE){

		$r0->exec("CREATE TABLE IF NOT EXISTS x(id INTEGER PRIMARY KEY, a TEXT, b TEXT, c TEXT, d TEXT, e TEXT, f TEXT, g TEXT, h TEXT, i TEXT, j TEXT, k TEXT, l TEXT, m TEXT, n TEXT, o TEXT, p TEXT, q TEXT, r TEXT, s TEXT, t TEXT, u TEXT, v TEXT, w TEXT, x TEXT, y TEXT, z TEXT, type TEXT NOT NULL)");

		$r0->exec("CREATE TABLE IF NOT EXISTS wallets(id INTEGER PRIMARY KEY, a TEXT, b TEXT, c TEXT, d TEXT, e TEXT, f TEXT, g TEXT, h TEXT, i TEXT, j TEXT, k TEXT, l TEXT, m TEXT, n TEXT, o TEXT, p TEXT, q TEXT, r TEXT, s TEXT, t TEXT, u TEXT, v TEXT, w TEXT, x TEXT, y TEXT, z TEXT, type TEXT NOT NULL)");

		//non sensitive data
		$r1->exec("CREATE TABLE IF NOT EXISTS z(id INTEGER PRIMARY KEY, a TEXT, b TEXT, c TEXT, d TEXT, e TEXT, f TEXT, g TEXT, h TEXT, i TEXT, j TEXT, k TEXT, l TEXT, m TEXT, n TEXT, o TEXT, p TEXT, q TEXT, r TEXT, s TEXT, t TEXT, u TEXT, v TEXT, w TEXT, x TEXT, y TEXT, z TEXT, type TEXT NOT NULL)");
		
		 //encrypt, database stores the IV
     $iv = gen_iv(); //genIV temp disabe to test 
     //$ivenc = base64_encode($iv);
     $ivenc = bin2hex($iv);
     $iv = $ivenc;
     //$encrypted_code = openssl_encrypt($code, "AES-256-CBC", $password, 0, $iv); //not used
     $key = generateRandomString(); //genkey
     
     chmod($rpcpath, 0600);
     $strrpc = file_get_contents($rpcpath);
     $strrpc = replace_between($strrpc,'$iv="','";',$ivenc);
     $strrpc = replace_between($strrpc,'$key="','";',$key);
     file_put_contents($rpcpath, $strrpc);
		 chmod($rpcpath, 0400);
		 
		 
		 /*****************************************
		  
		   DELETE THE html_root_setup_page.php 
		   
		   //unlink('php/html_root_setup_page.php');
		   
		 ******************************************/
}

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
      		
      	 			$sql = "SELECT id FROM x WHERE b LIKE '$un' OR d = '$em'";
		         	$res = $r0->query($sql); // or die("Error in query");
		         	
				         		$rows = 0; //set row counter to 0
										while($row = $res->fetchArray()) {
    								$rows += 1; //+1 to the counter per row in result
										}

	  	
								if($rows>0) {
								
										echo "1"; 		
      							$code = file_get_contents($db); //Get the encrypted file into a string.
       					  	$code = encrypt_decrypt('encrypt', $code, $key, $ivdec); //Encrypt the db.
      							file_put_contents($db, $code); //return the ecrypted string to file.
										die();
										
      					}
      
    if ($root == TRUE){
			//Insert the root user into x (is_root_user,username,password,wallet_name,encrypt_key,zid,type)
			$r0->exec("INSERT INTO x(a,b,c,d,e,y,z,type)VALUES('$root','$fn','$em','$un','$pw','1','$id','1')");
			$r0->exec("INSERT INTO wallets(a,b,c,type)VALUES('$id','Root','$pw','1')");
		}else{	//Insert the root user into x (is_root_user,username,password,wallet_name,encrypt_key,zid,type)
			$r0->exec("INSERT INTO x(a,b,c,d,e,y,z,type)VALUES('$root','$fn','$em','$un','$pw','1','$id','1')");
		}
		
			$r0->close();

      				$code = file_get_contents($db); //Get the encrypted file into a string.     					
       			  $code = encrypt_decrypt('encrypt', $code, $key, $ivdec); //Encrypt the db.
      				file_put_contents($db, $code); //return the ecrypted string to file.
      				 	
		 
		//tab preferences
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('0','News','news','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('1','Overview','overview','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('2','Send','send','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('3','Receive','receive','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('4','Transactions','transactions','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('5','Options','options','php','$id','1')");
    $r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('6','','help','php','$id','1')");

    //set default tab type 2
		$r1->exec("INSERT INTO z(a,b,c,d,z,type)VALUES('1000','0','0','0','$id','2')");



    		//require '../bitcoin/autoload.php'; // Included in RPC.php, already included at top of page 
  
 		if ($root == TRUE && $gen_wallet == TRUE) { //only generate wallet for root user

  		  try {
  	  		$bitcoin_wallet_management = $bitcoin_instance->wallet->management; //create wallet
  	  		$res = $bitcoin_wallet_management->create("Root", false, false); //return confirmation
  		  } catch(Exception $e) {
  	    echo 'Message: ' .$e->getMessage(). '. Check daemon is running, RPC username/password identical, firewall exception and ports forwarded';
	  	    die();
	  	  }
    
  	}

    	/*
    		print_r($bitcoin_wallet_management->list_all()); //test commands
      	print_r($bitcoin_wallet_management->get_wallet_info());

      	  Every call requires one of ...
      	    $bitcoin_utils = $bitcoin_instance->util;
      	                     $bitcoin_instance->raw_transaction;
      	                     $bitcoin_instance->generating;
      	                     $bitcoin_instance->raw_transaction;
      	                     $bitcoin_instance->blockchain;
      	                     $bitcoin_instance->wallet->management;
    	*/


				$r1->close();

	
								echo "NNHbHozQikWmU4YheAWW"; //The user name is OK and created database


function encrypt_decrypt($action, $string, $secret_key, $secret_iv){
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
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
}

function gen_iv(){
    $efforts = 0;
    $maxEfforts = 50;
    $wasItSecure = false;

    do
    {
        $efforts+=1;
        $iv = openssl_random_pseudo_bytes(16, $wasItSecure);
        if($efforts == $maxEfforts){
            throw new Exception('Unable to genereate secure iv.');
            break;
        }
    } while (!$wasItSecure);

    return $iv;
}

function generateRandomString($length = 512) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function replace_between($str, $needle_start, $needle_end, $replacement) {
    $pos = strpos($str, $needle_start);
    $start = $pos === false ? 0 : $pos + strlen($needle_start);

    $pos = strpos($str, $needle_end, $start);
    $end = $start === false ? strlen($str) : $pos;
 
    return substr_replace($str,$replacement,  $start, $end - $start);
}

?>
