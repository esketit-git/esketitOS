<?php

if(!isset($id) || empty($id)) die(); // or redirect to logout.php
//unset( $_GET );
//echo $_SERVER['REQUEST_METHOD'];
//if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();
//if ($_SERVER['REQUEST_METHOD'] === 'GET') {

?>

<script>

var base = window.location.toString().split("?")[0].replace(/[^\/]+$/,"")

		$(document).ready(function() {

		 	$("#first").hide(); //login
     	$("#third").hide(); //setup account
     	//$("#fourth").hide(); //retrieve password
     	$("#first").show();
     	
				// Goto Show SignUp Form, hide the rest
  			$('#goto-setup-button').on('click',function() {
      		$("#first").hide();
      		$("#third").hide();
      		//$("#fourth").hide();
      		$("#third").show();
      	}); //goto show signup form
      	
				$('#login-form').on('submit',function(e) {
				  e.preventDefault();
				  
						var un = $("#lun").val();
						var pw = $("#lpw").val();
    				var id = $("#lid").val();

		 var pwhash = sha3_512(pw)
		 var unhash = sha3_512(un)
		 
    				var txt = "un="+unhash+"&pw="+pwhash+"&id="+id;
      			var url = base + 'php/login.php'

							$.ajax({url:url,type:"POST",cache:false,data:{
              			un:unhash,
              			pw:pwhash,
              			id:id
        			}, success: function(result) {
        			
        				//alert(result)
        				
        						if (result.includes("NNHbHozQikWmU4YheAWW")) {
                    		//	alert ("Login is accepted. Click OK proceed.")
													//superficial access granted do the check on interface.php		 	
					      					//window.location.href = "interface.php";
					      					
													var form = $('<form action="interface.php" method="post">' +
													'<input type="hidden" name="un" value="' + unhash + '" />' +
													'<input type="hidden" name="pw" value="' + pwhash + '" />' +
  												'<input type="hidden" name="id" value="' + id + '" />' +
  												'</form>');
														$('body').append(form);
														form.submit();
														
									} else {
					         					$('.form').effect( "shake" );
					         					
					         					//alert(result)
									}
									
							} //function result
						}); //ajax
					}); //login form */
					
					
					/*****************************************************

        					      Go Back Button to LOGIN

					******************************************************/

			  // Show Login Form, hide the rest
  			$("#goback-button").click(function() {
  			  //$("#third").hide();
      		$("#third").hide();
      		$("#first").hide();
      		$("#first").show();
  			});
  
}); //document ready	

</script>

	<div id="first">
					<div class="tooltip"><img src="images/info.png" title='Sign In
					
Enter your account information, username and password and then click the LOGIN button. If you do not have an account click ACCOUNT SETUP and make a new account.

No Forgot Password

If you forget your password, there is no way to retrieve your username or password. Write your wallet passphrases and your username and password down with a real pen and store in a safe place and test that you can login.

Esketit OS Is Locally Hosted

Esketit OS runs entirely on your computer, you are not logging into another system. The account is to allow multiple users each with their own credentials and for enterprise systems.'>

					</div>
			<p class="neg5"><img src="images/login.png" width="48"></p>
			<form id="login-form">
					<p id="result"></p>
      	<input id="lid" type="hidden" name="id" value="<?php echo $id; ?>" />
				<input id="lun" type="text" placeholder="username &#128101;" name="un" maxlength="128" maxlength="128" minlength="3" required />
				<input id="lpw" type="password" placeholder="password ****" name="pw" maxlength="128" maxlength="128" minlength="8" required />
				<input type="submit" id="login-button" value="LOGIN &#9745;">
		<?php
		
		$tmp = dirname(__FILE__, 4); //4 dirs up from the location of this file is the db
		$dir = $tmp."/sys";
		$db1 = $dir."/z.db";
		
			$db = new SQLite3($db1);
        	$res = $db->query("SELECT c,d FROM z WHERE a='1000'");

                  $data=array(); //Create array to keep all results

                  //fetch associated array (1 for SQLITE3_ASSOC)
                  while ($row = $res->fetchArray(1)) {
                    
                    	array_push($data, $row); //insert row into array
                    
                  }
 
						$db->close();
						
		if ($data[0]['c'] == '0') echo '<button type="button" id="goto-setup-button">ACCOUNT SETUP &#9997;</button>';
		?>
			</form>
	</div>
