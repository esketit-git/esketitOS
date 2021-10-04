<?php

header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if(("" == trim($_POST['un'])) || 
   ("" == trim($_POST['pw'])) ||
   ("" == trim($_POST['id']))){
   
   			echo '<start><html><head>';
        echo '<meta http-equiv="refresh" content="1;url=index.php" />';
    		echo '</head><body></body></html>';

   			die();
   	}

	$un = $_POST['un'];
	$pw = $_POST['pw'];
	$id = $_POST['id'];
	
		require_once('php/login.php'); //the login is done again

		if ($access_or_denied != "NNHbHozQikWmU4YheAWW") {
		
		  echo '<start><html><head></head><body><meta http-equiv="refresh" content="1;url=index.php" /></body></html>';
			die(); exit();
		
		} //Do the login check again and only display the page if ok.

  $zid = $dbz;
/* the saved tabs 
	
Array
	(
    [0] => Array
        (
            [id] => 1
            [a1] => 0      //tab #
            [b2] => News   //tab name
            [c3] => news   //folder name (in default path ../)
            [d4] => php    //file ext of default file (index.ext)
*/

?>
<start>
<html>
<head>
<meta charset="UTF-8">
<title>esketit</title>

<link href="css/interface.css" rel="stylesheet" type="text/css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/interface.js"></script>
    <script type="application/x-javascript" src="js/sha3.js"></script>
   			
		<script>
		
	 		//var tab_focus = document.querySelector('input[name="tabs"]:checked').value;
	 		
$(document).ready(function() {

	// then echo it into the js/html stream
	// and assign to a js variable
	var default_tab = '<?php echo $dat2['0']['b'];?>';
	
	//alert(default_tab);
	
			document.getElementById("radio"+default_tab).checked = true;
										tab_focus = default_tab;
										
	//Logout Button
	$("input[id^='200']").click(function(){
	
		zid=$('#zid').val();
		id=$('#id').val();

				//alert(tab_focus);
				$.ajax({
   				url: 'php/logout.php',
   				type: 'POST',
   					data: {
   										zid: zid,
   										tab: tab_focus
   					},
   				success: function(response){
   				
   		//				alert(response);
   				
   						window.location.replace('interface.php'); //logout
   				    window.location.href = "interface.php";
			
   				}
				});
	
	});
	
	$("input[id^='radio']").click(function(){
		
		zid=$('#zid').val();
		
			$.ajax({
   				url: 'php/savedb.php',
   				type: 'POST',
   					data: {
   										type: '2',
   										tab: tab_focus,
   										zid: zid
   					},
   						success: function(response){
											//	alert(response)
   					} 			
   	});
	});
	
	//Top Nav
	$("input[id^='10']").click(function(){
	//$("#100,#101,#102,#103").click(function(){ //the top nav id's start from left to right 1000,101...
	
	
				var tab = "#content" + tab_focus //when a user clicks a tab it sets this variable page wide
	 			var id = this.id; //the id of the nav clicked (not used)
	 			var name = this.name;
	 			var path = "../" + this.value + "/index.php"; //the path of the menu item
	
				zid=$('#zid').val();
				id=$('#id').val();
				un=$('#un').val();
				pw=$('#pw').val();
	
								
				//Checkif menu item is not already displayed.
				var trip = 0; 
												
						for (let i=0;i<7;i++) {
						
							//alert(name + ($("#label"+i).text()))
						
							if (name.localeCompare($("#label"+i).text()) == 0) {

										trip = 1;

										document.getElementById("radio"+i).checked = true;
										tab_focus = i;

							}

		      	}
   	
				     if (trip == 0) {

							if (this.name == "") {
								//$("#label"+tab_focus).text('Help')
								document.getElementById("label"+tab_focus).innerHTML = '<img src="../help/icon.png" width="32">';
							} else {
								$("#label"+tab_focus).text(this.name); //the name of the menu item to display
	 						}
							//$("#content0").load("../tokenstore/index.php", {'t1':str1,'t2':str2,'t3':str3}); //unused example
							$(tab).load(path, {'un':un,'pw':pw,'id':id,'zid':zid});
			
						}
						
						
						//Immediately save, grabs correct tab and id of button clicked
						
						//alert(tab_focus + " " + this.id)
					
						//var username = document.getElementById( this.id ).getAttribute("t1"); = str1
						//var tab = document.getElementById( this.id ).getAttribute();  = tab_focus 
						var displayname = document.getElementById( this.id ).getAttribute("name"); 
						var foldername = document.getElementById( this.id ).getAttribute("value"); 
						var ext = document.getElementById( this.id ).getAttribute("ext"); 
						
	
				// jquery here
				// run thatinto sql
				//alert(tab_focus)

				$.ajax({
   				url: 'php/savedb.php',
   				type: 'POST',
   					data: {
   										type:'1',
   										zid:zid,
   										tab:tab_focus,
   										displayname:displayname,
   										foldername:foldername,
   										ext:ext
   					},
   				success: function(response){
											
										//	alert(response)
   				}
			});
	})
})

		
	</script>

</head>
<body>

<?php

for($i=0;$i<7;$i++) {

  if (empty($dat2[$i]['b'])) {
  
  		$dat2[$i]['b'] = '<img src="../help/icon.png" width="32">';
  		
  }
//echo $username;
//echo $password;
//echo $id;
}
?>

	<header class="header">
		
			<input type="hidden" name="zid" id="zid" value="<?=$zid?>"> 
    	<input type="hidden" name="id" id="id" value="<?=$id?>">
    	<input type="hidden" name="un" id="un" value="<?=$un?>"> 
    	<input type="hidden" name="pw" id="pw" value="<?=$pw?>">
			<ul class="main-nav">
			

		<?php
		
		$tmp = dirname(__FILE__, 3); //4 dirs up from the location of this file is the db
		$dir = $tmp."/sys";
		$db1 = $dir."/z.db";
			
			$db = new SQLite3($db1);
        	$res = $db->query("SELECT c,d,z FROM z WHERE a='1000'");

                  $d4=array(); //Create array to keep all results

                  //fetch associated array (1 for SQLITE3_ASSOC)
                  while ($row = $res->fetchArray(1)) {
                    
                    	array_push($d4, $row); //insert row into array
                    
                  }
 
						$db->close();
						
					if ($d4[0]['z'] == $zid) {
							echo '<li><input class="buttons" title=" wallets " type="image" 
							src="../wallet/icon.png" alt="Wallet Button" id="100" value="wallet" name="Wallets" ext="php"></li>';
					} else {
						
							if ($d4[0]['d'] == '0') echo '<li><input class="buttons" title=" wallets " type="image" 
							src="../wallet/icon.png" alt="Wallet Button" id="100" value="wallet" name="Wallets" ext="php"></li>';
					}
?>

				<li><input class="buttons" title=" token store " type="image" 
						src="../tokenstore/icon.png" alt="Token Store Button" id="101" value="tokenstore" name="Token Store" ext="php"></li>
				<li><input class="buttons" title=" develop dApps " type="image" 
						src="../developers/icon.png" alt="Develop Tokens Button" id="102"  value="developers" name="Developers" ext="php"></li>
				<li><input class="buttons" title=" translate " type="image" 
						src="../translate/icon.png" alt="Translate Button" id="103" value="translate" name="Translate" ext="php"></li>
				<li><input class="buttons" title=" logout" type="image" 
						src="images/logout-32.png" alt="Logout Button" id="200" value="logout" name="Logout" ext="php"></li>
			</ul>

	<div style="width: 400px; font-family: sans-serif; font-size:14px">
		<label for="wallets" style="color: #fff; font-size: 14px; font-weight: bold">Active Wallet:</label>
		<select name="wallets" id="wallets">
    
<?php

	for ($i = 0; $i < count($data); $i++) {
	    $tmp = $wall[$i]['b'];
	    
	    echo '<option value="'.$tmp.'">'.$tmp.'</option>';
	    
	}

?>

		</select>

<?php if ($data['0']['a'] == 1) echo '<nobr>&nbsp;<img src="images/warning-sign.png" style="width: 28px; vertical-align: middle">&nbsp;<span style="color: red; font-weight: bold">Warning ROOT User</span></nobr>'; ?>

	</div>

			<input class="buttons" title=" visit hompage " onclick="window.open('https://esketit.org/')" type="image" src="images/esketit.png" width="180" alt="Submit" id="homepage" value=" homepage ">

	</header>
	

<table class="table">
<tr><td style="max-width: 68%; vertical-align: top">


<div class="tabs" id="tabs">

<!---------------- News -------------------->

	<input type="radio" name="tabs" id="radio0" checked="checked" onClick="tab_focus = 0">
  	<label class="monkey" for="radio0" id="label0"><?php
  												if ($dat1['0']['b'] == 'Help') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['0']['b']; 
  																	?></label> <!-- News -->
		<div class="tab">
	
			<div id="content0">

						<?php
				
					
						$path = $dat1['0']['c'];
						$ext = $dat1['0']['d'];

				    require_once "../".$path."/index.".$ext; //News ../news/index.php
				    
				  ?>
				
			</div>


		</div>


<!---------------- Overview -------------------->


  	<input type="radio" name="tabs" id="radio1" onClick="tab_focus = 1">
  	<label class="monkey" for="radio1" id="label1"><?php
  												if ($dat1['1']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['1']['b']; 
  																	?></label> <!-- Overview -->
		<div class="tab">
	
			<div id="content1">
			
					<?php
	
						$path = $dat1['1']['c'];
						$ext = $dat1['1']['d'];

				    require_once "../".$path."/index.".$ext; //Overview
				    
				  ?>
				  
			</div>
		</div>


<!---------------- Send -------------------->


  	<input type="radio" name="tabs" id="radio2"  onClick="tab_focus = 2">
  	<label class="monkey" for="radio2" id="label2"><?php
  												if ($dat1['2']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['2']['b']; 
  																	?></label> <!-- Send -->
		<div class="tab">
	
			<div id="content2">
						
					<?php
					
						$path = $dat1['2']['c'];
						$ext = $dat1['2']['d'];

				    require_once "../".$path."/index.".$ext; //Send
				    
				  ?>
				  
			</div>
		</div>


<!---------------- Recieve -------------------->


  	<input type="radio" name="tabs" id="radio3"  onClick="tab_focus = 3">
  	<label  class="monkey" for="radio3" id="label3"><?php
  												if ($dat1['3']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['3']['b']; 
  																	?></label> <!-- Recieve -->
  		<div class="tab">
	
			<div id="content3">
									
					<?php
					
						$path = $dat1['3']['c'];
						$ext = $dat1['3']['d'];

				    require_once "../".$path."/index.".$ext; //Receive
				    
				  ?>
				  
			</div>
		</div>


<!---------------- Transactions -------------------->


  	<input type="radio" name="tabs" id="radio4"  onClick="tab_focus = 4">
  	<label class="monkey" for="radio4" id="label4"><?php
  												if ($dat1['4']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['4']['b']; 
  																	?></label> <!-- Transactions -->
		<div class="tab">
	
			<div id="content4">
				
				<?php
					
						$path = $dat1['4']['c'];
						$ext = $dat1['4']['d'];

				    require_once "../".$path."/index.".$ext; //Transactions
				    
				  ?>
				  
</div>
		</div>


<!---------------- System -------------------->

  	<input type="radio" name="tabs" id="radio5"  onClick="tab_focus = 5">
  	<label  class="monkey" for="radio5" id="label5"><?php
  												if ($dat1['5']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['5']['b']; 
  																	?></label> <!-- Options -->
		<div class="tab">
			<div id="content5">
			
				<?php
					
						$path = $dat1['5']['c'];
						$ext = $dat1['5']['d'];

				    require_once "../".$path."/index.".$ext; //Receive
				    
				  ?>
				  
				<?php //require_once "php/options.php"; <p>List toggle to all the options here</p> ?>		
				<?php //require_once "php/system.php"; 	<p>List all the system information here</p> ?>
				
				</div>
		</div>


<!---------------- Help -------------------->


  	<input type="radio" name="tabs" id="radio6"  onClick="tab_focus = 6">
  	<label for="radio6" id="label6"><?php
  												if ($dat1['6']['b'] == '') echo '<img src="../help/icon.png" width="32">';
  												else echo $dat1['6']['b']; 
  																	?></label>
		<div class="tab">
	
			<div id="content6">
			
					<?php
					
						$path = $dat1['6']['c'];
						$ext = $dat1['6']['d'];

				    require_once "../".$path."/index.".$ext; //Help
				    
				  ?>
				  
				</div>
  		</div>

</div>

<script>
//document.getElementById("radio0").checked = true;
//tab_focus = 0;
	 		//var tab_focus = document.getElementsByName("tabs").value;
	 		//alert(tab_focus);
	 		
	 		var ele = document.getElementsByName('tabs');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked) var tab_focus = i // alert(i)
               // document.getElementById("result").innerHTML
                        //= "Gender: "+ele[i].value;
            }
</script>



</td><td style="min-width: 32%; vertical-align: top">

<div class="rcorners2">

<script>

						for (let i = 0; i < tabname.length; i++) {
						
							if (name.localeCompare(tabname[i]) == 0) {
							
										trip = 1;
										
										document.getElementById("radio"+i).checked = true;
										tab_focus = i;

												//set active tab 
												//alert("f: " + id + name + tabname[i])		
												//alert("f: " + i)		
							
							}

</script>

		<h3>Your Token Apps</h3>

<table style="font-size: 12px; width: 100%; text-align: center">
<tr>
<!-- these are default apps -->
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../buycoin/icon.png" alt="Buy Coins" height="48" id="1050" title="buy coin" value="buycoin" name="Buy Coin" ext="php"><br />buy coin</td>

<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../fundmed/icon.png" alt="Fund Med" height="48" id="1051" title="fund research" value="fundmed" name="Fund Research" ext="php"><br />fund research</td>

<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../homage/icon.png" alt="Bitcoin Homage" height="48" id="1052" title="homage" value="homage" name="Homage" ext="php"><br />homage</td>

<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../news/icon.png" alt="News" height="48" id="1053" title="news" value="news" name="News"  ext="php"><br />news</td>

</tr><tr>

			<div id="sofware">
	
				<!-- go into the database and grab the apps and display them -->
	
	
	
				<!-- All the users software, scan for apps load them here -->
	
				<!-- Aliexpress, Amaxon, Ebay, Binance, Shopping Cart, Hotelier, Point of sale, stock trading, chat, games -->

		<?php
		
		for ($i = 0; $i < count($dat3); $i++) {
    	
    	/*
    		try and sync as much as possible, what the menu needs...
    	
    				path - icon - lowercase name - tooltip 
    	 
    	 			-> folder name
    	 					-> index.php (or your ext)
    	 					-> icon.png
    	 			
    	 			-> tooltip
    	 			-> href
    	*/
    	
    	 if ( $i%4 == 0) echo "</tr><tr>";
	
				$icon = $dat3[$i]['d']."/icon.png";
				$name = strtolower($dat3[$i]['b']);
				$tabname = ucwords($dat3[$i]['b']);
				$ext = strtolower($dat3[$i]['e']);
				$folder = strtolower($dat3[$i]['d']);
				
				echo '<td style="text-align: center; width: 25%">';
				echo '<input class="buttons" type="image" src="../'.$icon.'  " alt="'.$name.'" height="48" id="1000'.$i.'" title="'.$name.'" value="'.$folder.'" name="'.$tabname.'" ext="'.$ext.'"><br />'.$name.'</td>';
			
				
				//array $dataI holds the installed app data

		
		}
		

		?>

		</div>


</tr><tr><td colspan="4"><hr></td>

</tr><tr>
<!-- these are default apps that come from the bitcoin qt gui wallet -->
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../overview/icon.png" alt="Overview" height="48" id="1054" title="overview" value="overview" name="Overview" ext="php"><br />overview</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../send/icon.png" alt="Send" height="48" id="1055" title="send" value="send" name="Send" ext="php"><br />send</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../receive/icon.png" alt="Receive" height="48" id="1056" title="receive" value="receive" name="Receive" ext="php"><br />receive</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../transactions/icon.png" alt="Transactions" height="48" id="1057" title="transactions" value="transactions" name="Transactions" ext="php"><br />transactions</td>

</tr><tr>

<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../options/icon.png" alt="Options" height="48" id="1058" title="options" value="options" name="Options" ext="php"><br />options</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../daemon/icon.png" alt="Daemon" height="48" id="1059" title="daemon" value="daemon" name="Daemon" ext="php"><br />daemon</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../themes/icon.png" alt="Help" height="48" id="1060" title="themes" value="themes" name="Themes" ext="php"><br />themes</td>
<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../help/icon.png" alt="Help" height="48" id="1061" title="help" value="help" name="" ext="php"><br />help</td>
</tr>
<tr>

<td style="text-align: center; width: 25%">
<input class="buttons" type="image" src="../games/icon.png" alt="Games" height="48" id="1062" title="games" value="games" name="Games"  ext="php"><br />games</td>

</tr>
</table>

</div>
</td></tr>
</table>

<div id="loader"></div>

</body>
</html>
