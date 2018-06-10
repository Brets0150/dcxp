<?php
////////////////////////////////////////////////////////////////
// START Admin User Account Control //
///
session_start();
///////////////////
// Below used for testing
error_reporting(E_ALL);
ini_set("display_errors", true);
///////////////////
// Check if the User has Admin Rights. If not kick them back to the Home page.
if (!$_SESSION["bln_admin"]) {
		$_SESSION["str_error_code"] = "Restricted Area!";
			header("location: /");
}

///
// END Admin User Account Control //
////////////////////////////////////////////////////////////////
?>