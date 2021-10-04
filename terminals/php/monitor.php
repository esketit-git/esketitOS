<html>
<head>
</head>
<body>

<?php

 /*********************************************************
   Updates and check RPC Info is synced
   changed do not take effect until daemon is restarted
 **********************************************************/
 
      echo '<h2>Syncing RPC Passwords...</h2>' . "\n"; //check conf for RPC username and password

		// current directory
		echo "PWD: ".getcwd() . "\n";

		$user = posix_getpwuid(posix_getuid());

		//echo "<pre>";
		//print_r($user);
		//echo "</pre>";

		echo "<p>Path: ".$user['dir']."/.bitcoin/bitcoin.conf</p>";

    	$file = $user['dir']."/.bitcoin/bitcoin.conf";
    
    	//read conf file
    	$content=file_get_contents($file);
    
    		//Generate username and password
            $rpcuser = generateRandomString();
            $rpcpass = generateRandomString();
            
				//Run it through rpcauth.py
				$command = escapeshellcmd('../py/rpcauth.py '.$rpcuser.' '.$rpcpass);
				$output = shell_exec($command);	
				//ob_start();
				//passthru('/usr/bin/python3 ../py/rpcauth.py arg1 arg2');
				//$output = ob_get_clean(); 
				
				echo $output;
				
				$output = str_replace('$', 'remove_reserved_char_placeholder', $output); //the $ causes an issue
				
        		$content = preg_replace('/rpcauth=(.*)/', $output, $content); //place command in conf
        		
        		$content = str_replace('remove_reserved_char_placeholder', '$', $content); //restore the $ sign
				
        		//echo $content;

        		//echo $content;
    				//Deprecated RPC username password
    				//$content = preg_replace('/rpcuser=(.*)/i', $rpc_user_concat, $content);
    				//$content = preg_replace('/rpcpassword=(.*)/i', $rpc_pass_concat, $content);

        //echo $content;
        // here goes your update
        $rpc_user_concat = 'rpcuser='.$rpcuser;
        $rpc_pass_concat = 'rpcpassword='.$rpcpass;
        
    		//write file
    		file_put_contents($file, $content);
    
    //sync with for the UI interface rpc file
    
    $file = "rpcconf.php";
    $content=file_get_contents($file);
    
    	$content = '<?php' . "\n";
        $content .= 'include_once (\'../bitcoin/autoload.php\');' . "\n";
        $content .= 'include_once (\'jsonRPCClient.php\');' . "\n\n";
        $content .= '$bitcoin = new jsonRPCClient(\'http://'.$rpcuser.':'.$rpcpass.'@127.0.0.1:8332/\'); ' . "\n";
        $content .= '$bitcoin_instance = new bitcoin\bitcoin(\'http://127.0.0.1:8332\', \''.$rpcuser.'\', \''.$rpcpass.'\'); ?>' . "\n";;
    	$content .= '?>' . "\n";
    
        file_put_contents($file, $content);
    
    echo "<p><b>RPC has been changed restart daemon for changes to take effect.</b></p>";
    
 /******************************************
   Check Daemon Is Running
 ******************************************/ 

      echo '<h2>Daemon Check...</h2>' . "\n";

  //check if daemon is running
  exec("pgrep bitcoind", $pids);

    if(empty($pids)) {

      echo '<h3>Daemon is not running!</h3>' . "\n";

    // daemon is not running!
    //Attempt to start the daemon
    //$output = shell_exec('bitcoind -daemon -testnet');

    //    echo "<pre>$output</pre>";

    } else {

      echo "<h3>Daemon detected as running, pid: ";
      print_r($pids);
      echo "</h3>";

    }

  echo '<h2>Port Check...</h2>' . "\n";

  //check if port is open
  $host = '127.0.0.1';
  $ports = array(8332, 18333, 18334, 4000);

  foreach ($ports as $port)
  {
    $connection = @fsockopen($host, $port);

    if (is_resource($connection))
    {
        echo '<h3>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h3>' . "\n";

        fclose($connection);
    }

    else
    {
        echo '<h3>' . $host . ':' . $port . ' is not responding. Check firewall rules or router port forward</h3>' . "\n";
    }
}




function generateRandomString($length = 128) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    
?>
    
</body>
</html>
