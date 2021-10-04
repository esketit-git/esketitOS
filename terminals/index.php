<start>
<?php
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

  /*
  check that daemon is running on every index.php
  This acts as a node monitor and emails the admin
  if the node is down 
  */

	$tmp = dirname(__FILE__, 3); // up 4 from current directory
  $dir = $tmp."/sys";  //location of systems directory
  $rpcpath = $tmp."/sys/rpc.php"; //location of rpc
  include_once($rpcpath); //rpc auth creditials for running system commands
  
   /* Check if daemon is running */  
    try {
          $r = $bitcoin->uptime(); //	echo "Uptime = "; print_r($r); echo "\n"; //debug
    } catch(Exception $e) {
    
    		//mail(sex.com, "server is down"); //email admin daemon not running.
    		exec('sh -c "exec nohup setsid bitcoind -testnet > /dev/null 2>&1 &"'); //attempt to start node.
    }

  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  function generate_string($input, $strength = 16) {
      $input_length = strlen($input);
      $random_string = '';
        for($i = 0; $i < $strength; $i++) {
          $random_character = $input[mt_rand(0, $input_length - 1)];
          $random_string .= $random_character;
        }

    return $random_string;
  }

  //Output: Jp8iVNhZXhUdSlPi1sMNF7hOfmEWYl2UIMO9YqA4faJmS52iXdtlA3YyCfSlAbLYzjr0mzCWWQ7M8AgqDn2aumHoamsUtjZNhBfU
  $id = generate_string($permitted_chars, 100);
  /*
     Every form contains a hidden sid field, no cookies and send with encrypted body
     Extracted on the other side and a file is generated with the same id and
     contains session info. This is the choice between unencrypted session id in http
     header and sending session id in an ecrypted body.

      Only index.php creates the id, interface must receieve it $_POST.
      Client side login systems are not possible so interface.php is a redirect
      on successful login.


Check for root user, if root user does not exist
assume first install and create a root user
*/ 

$tmp = dirname(__FILE__); //and root setup files not deleted must be new system
$r_file = $tmp."/php/html_root_setup_page.php";
$s_file = $tmp."/php/html_setup_page.php";
$l_file = $tmp."/php/html_login_page.php";


//no key set, root setup file not deleted must be new system
if ($key == "" || $iv == "" || file_exists($r_file)) $root_user = TRUE; // $root_user = FALSE;
else $root_user = FALSE;
?>

<!DOCTYPE html>
<html>
<head>
<title>esketitOS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="esketit.org">
<meta name="keywords" content="esketit">
<meta name="description" content="esketitOS">
<meta name="robots" content="none">
<meta name="copyright" content="esketit">
<link rel="icon" href="favicon.png" type="image/png" />
<link href="css/style.css" rel="stylesheet" type="text/css">

    <script type="application/x-javascript" src="js/jquery.js"></script>
    <script type="application/x-javascript" src="js/jquery-ui.js"></script>
    <script type="application/x-javascript" src="js/sha3.js"></script>

    <script type="text/javascript">
    /* Fantastic new background image on page refresh effect */
        window.onload = function () {
          const images = [];

            for (let i = 0; i < 51; i++) images[i] = 'images/backgrounds/'+ i +'.jpg';
            var image = images[Math.floor(Math.random() * images.length)];
            document.getElementsByTagName('body')[0].style.background = "url('" + image + "') no-repeat center center fixed";
            document.getElementsByTagName('body')[0].style.backgroundRepeat = "no-repeat";
            document.getElementsByTagName('body')[0].style.backgroundSize = "cover";
        }
    </script>

</head>
<body>

<div class="login-page">
  				<div class="form">
  
<?php
  						//Which page to display
  						if ($root_user == TRUE) { require_once ($r_file);
  						} else { require_once ($l_file);
  									   require_once ($s_file); }
?>

  				</div>
</div>

</body>
</html>
