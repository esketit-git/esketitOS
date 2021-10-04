<?php

//$un = $_POST['un'];
$zid = $_POST['zid'];
$default_tab = $_POST['tab'];


$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db		  	
	$dir = $tmp."/sys";
	$db2file = $dir."/z.db";
	$db = new SQLite3($db2file);
 	        
		    
				$query = $db->exec("UPDATE z SET b='$default_tab' WHERE type='2' AND z='$zid'");
						  
		   //die(); exit();
		
		unset($_POST['un']);
		unset($_POST['pw']);
		unset($_POST['zid']);
		unset($_POST['id']);

$un = "";
$pw = "";
$id = "";
$zid = "";
?>
