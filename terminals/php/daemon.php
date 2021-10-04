<?php
/*
  //check if daemon is running
  exec("pgrep bitcoind", $pids);

    if(empty($pids)) {

      //daemon is not running! Start it.
    //  exec("bitcoind -testnet", $pids);

    }

  //check if port is open

  $host = '127.0.0.1';
  $ports = array(8332, 18333, 18334, 4000, 80, 443);

  foreach ($ports as $port)
  {
    $connection = @fsockopen($host, $port);

    if (is_resource($connection))
    {
        echo '<h2>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";

        fclose($connection);
    }

    else
    {
        echo '<h2>' . $host . ':' . $port . ' is not responding. Check firewall exception and port forward</h2>' . "\n";
    }
  }

    //check conf for RPC username and password

*/
?>
