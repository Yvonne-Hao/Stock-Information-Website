<?php
  echo "
  <div style = 'text-align: center; padding:1.5%'>
        <img src='logo3.png' height='70' weight='120' alt='logo'></div>
  <div style = 'text-align:left; width:85%; padding:1.5%;font-family: sans-serif; font-size:16px; margin-left: 5%;'>";


	$fname = $_POST["fullName"];
	$em = $_POST["email"];

	
	if(($fname != '') and ($em != '')){
			echo "Thank you! " . $fname . ". You have successfully  signed up for our monthly newsletter with email address: " . $em ;
		}
		else {echo "Please enter both Username and Password</div";
	}

?>
