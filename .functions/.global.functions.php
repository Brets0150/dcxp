<?php
////////////////////////////////////////////////////////////////
// START Global Functions //
///
///////////////////
// Below used for testing
error_reporting(E_ALL);
ini_set("display_errors", true);
///////////////////
///
///////////////////
/// START Template Funtion Code ///
// Template Discription
function fun_template() {
	echo "template function";
}
///
// END Template Funtion Code ///
//
///////////////////
/// START Check For Admin Rights Funtion Code ///
// Check if the User has Admin Rights. If not kick them back to the Home page.
function fun_check_admin_rights() {
	if ( !$_SESSION["bln_admin"] ) {
		$_SESSION["str_error_code"] = "Restricted Area!";
		header("location: /");
		exit;
	}
}
///
// END Check For Admin Rights Funtion Code ///
//
///////////////////
/// START Error Code Return and Redirect Funtion Code ///
// If there is an error, return the users to a page and present the error code.
function fun_error($var_page, $str_error_code) {
	$_SESSION["str_error_code"] = $str_error_code;
	$_SESSION["var_page"] = $var_page;
	header("location: /");
	exit;
}
///
// END Error Code Return and Redirect Funtion Code ///
//
///////////////////
/// START Check For Admin Rights Funtion Code ///
// Check if the User has Admin Rights. If not kick them back to the Home page.
function fun_message_redirect($var_page, $str_message) {
	$_SESSION["str_message"] = $str_message ;
	$_SESSION["var_page"] = $var_page;
	header("location: /");
}
///
// END Check For Admin Rights Funtion Code ///
//
///////////////////
/// START User Input Data Sanitization Funtion Code ///
//    Clean string data given by user input. Securly clean 
//    and check the data, then return the cleaned data
function fun_clean_input_data($str_data_to_be_cleaned) {
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	// Remove extra tailing and leading spaces from the string.
	$str_data_to_be_cleanede = trim($str_data_to_be_cleaned);
	// Strip NULL, HTML and PHP tags from the string
	$str_data_to_be_cleaned = strip_tags($str_data_to_be_cleaned);
	// Convert special characters in the string to HTML entities
	$str_data_to_be_cleaned = htmlspecialchars($str_data_to_be_cleaned);
	// Encode Username and Password string Data to an escaped SQL string.
	$str_data_to_be_cleaned = mysqli_real_escape_string($str_dbConnect,$str_data_to_be_cleaned);
	return $str_data_to_be_cleaned;
}
///
// END User Input Data Sanitization Funtion Code ///
//				
?>