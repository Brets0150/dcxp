<?php
/////////////////////////////
// START Global Functions //
///////////////////////////
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
/// START Check For USER Rights Funtion Code ///
// Check if the User logged in. If not kick them back to the Home page.
function fun_check_user_rights() {
	if ( !$_SESSION["str_username"] ) {
		$_SESSION["str_error_code"] = "Please login to view this page.";
		header("location: /");
		exit;
	}
}
///
// END Check For USER Rights Funtion Code ///
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
	$str_data_to_be_cleaned = trim($str_data_to_be_cleaned);
	// Strip NULL, HTML and PHP tags from the string
	$str_data_to_be_cleaned = strip_tags($str_data_to_be_cleaned);
	// Convert special characters in the string to HTML entities
	$str_data_to_be_cleaned = htmlspecialchars($str_data_to_be_cleaned);
	// Encode Username and Password string Data to an escaped SQL string.
	$str_data_to_be_cleaned = mysqli_real_escape_string($str_dbConnect, $str_data_to_be_cleaned);
	return $str_data_to_be_cleaned;
}
///
// END User Input Data Sanitization Funtion Code ///
//
///////////////////
/// START Check if a Value Exist in the DataBase Funtion Code ///
function fun_check_db_for_existing_values($str_tmp_sql) {
	// Connect to the database and check if the provided SQL query retunrs records.
	//   If more than "0" records are found then it exists in the Database.
	///
	// Example for "$str_tmp_sql"
	// $str_tmp_sql = "SELECT `job_id` FROM `jobs` WHERE `job_name` = '$str_job_name'";
	///
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	$str_result = mysqli_query($str_dbConnect,$str_tmp_sql);
	$ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC);
	$int_count = mysqli_num_rows($str_result);
	settype($int_count, "integer");
	// If "1" or more records found then the data exists in the Database.
	if ( $int_count > 0 ) {
		$bln_data_not_in_db_good = true;
		settype($bln_data_not_in_db_good);
	} else { // The DB does not have a job with the same name. Good To proceed.
		$bln_data_not_in_db_good = false;
		settype($bln_data_not_in_db_good, "bool");
	}
	// Clean the Mysql variable to make sure the new ones will be clean
	unset($str_tmp_sql, $str_result, $ary_row, $int_count);
	// return the results of the check.
	return($bln_data_not_in_db_good);
}
///
// END Check if a Value Exist in the DataBase Funtion Code ///
//
///////////////////
// START Get a single variable from the Database Funtion, ONE variable, NOT an ARRAY! ///
///
function fun_get_one_varabile_from_db($str_tmp_sql, $var_column_to_return) {
	// Connect to the database pull one column and one row of data
	///
	// Example for "$var_column_to_retur" would be `job_xp_value`
	///
	// Example for "$str_tmp_sql"
	// $str_tmp_sql = "SELECT `job_id` FROM `jobs` WHERE `job_name` = '$str_job_name'";
	///
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	$str_result = mysqli_query($str_dbConnect,$str_tmp_sql);
	$ary_row = mysqli_fetch_array($str_result);
	// return the results of the check.
	return($ary_row[$var_column_to_return]);
}
///
// END Get a single variable from the Database Funtion ///
//
///////////////////
// START Get ARRAY variable from the Database Funtion ///
///
function fun_array_varabile_from_db($str_tmp_sql) {
	// Connect to the database pull one column and one row of data
	///
	// Example for "$str_tmp_sql"
	// $str_tmp_sql = "SELECT `job_id` FROM `jobs` WHERE `job_name` = '$str_job_name'";
	///
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	$str_result = mysqli_query($str_dbConnect,$str_tmp_sql);
	$ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC);
	// return the results of the check.
	return($ary_row);
}
///
// END Get a Get ARRAY variable from the Database Funtion ///
//
///
/////////////////////////////
// END Global Functions ////
///////////////////////////
///
?>