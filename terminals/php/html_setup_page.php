<?php

//set headers to NOT cache a page
//header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
//header("Pragma: no-cache"); //HTTP 1.0
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
//or, if you DO want a file to cache, use:
//header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
//if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();
//unset( $_GET )
//if(!isset($id) || empty($id)) die();
//if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();

?>

<!-- the use of javascript can only be superficial, increased sever side checks required -->
<script>

		var base = window.location.toString().split("?")[0].replace(/[^\/]+$/,"")

			$(document).ready(function() {
			
				$('#signup_form').on('submit',function(e) {
				  e.preventDefault();

					var fn = $("#sfn").val();
					var un = $("#sun").val();
          var pw = $("#spw").val();
					var em = $("#sem").val();
          var id = $("#sid").val();
          
		 var pwhash = sha3_512(pw)
		 var unhash = sha3_512(un)
 
						var url = base + 'php/setup.php';
						
						    $.ajax({url:url,type:"POST",cache:false,data:{
						    		fn:fn,
                    un:unhash,
                    em:em,
                    pw:pwhash,
                    id:id
                }, success: function(result) {
                
                						if (result.includes("NNHbHozQikWmU4YheAWW")) {
                    									alert ("Account is created. Click OK to login")
                    									location.reload();
                            } else {
                            					alert ("Error: " + result + ". Account was not created.")
                            }
                            
               } //function-result
					}); //ajax-post
				}); //setup-button
			}); //document.ready

</script>


	<div id="third">
						<div class="tooltip"><img src="images/info.png" title='Username, Email Address and Password

Enter a username, a valid email address and a password. The username and password is used to log into the system while a valid email address is used to retrieve forgotton credentials.

Write it all down on a notepad along with any wallet passphrases and store in a safe place.

Terminal OS runs entirely on your computer, terminal OS is a multi user and a network operating system. When ready click SIGN UP to proceed.
		
&#8592; BACK Button

Returns to the login screen.'>							
					</div>

		<p class="neg5"><img src="images/signup.png" width="48"></p>

			<form id="signup_form">
    	<input id="sid" type="hidden" name="id" value="<?php echo $id; ?>" />
			<input id="sfn" type="text" placeholder="Enter full name &#128100;" maxlength="128" minlength="3" required />
			<input id="sun" type="text" placeholder="Enter a username &#128101;" maxlength="128" minlength="3" required />
			<input id="sem" type="email" placeholder="Enter a valid email address &#64;" maxlength="128" minlength="5" required />
			<input id="spw" type="password" placeholder="Password ****" maxlength="128" minlength="8" required />
				<input type="submit" id="setup-button" value="SIGN UP &#9997;">
				<button type="button" id="goback-button">&#8592; BACK</button>
		</form>
	</div>

