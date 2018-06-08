<?php
// Import required files to run and start the seasion.
require("/.config/.sql.php");
session_start();

// Start Declaring Variables

///
// Check if Username and Password were given. If not return to Login page
if(isset($_POST["username"]) && isset($_POST["password"])) {
	// Clean the user input
	$str_username = mysql_real_escape_string($_POST["username"]);
	$str_password = mysql_real_escape_string($_POST["password"]);
	
}else{
	echo 'No' ;
}




