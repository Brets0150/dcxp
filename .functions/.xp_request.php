<?php
////////////////////////////////////////////////////////////////
// START User Request XP Control //
///
session_start();
///////////////////
// Below used for testing
error_reporting(E_ALL);
ini_set("display_errors", true);
///////////////////
//  Import Global Funtions.
require($_SERVER["DOCUMENT_ROOT"].".functions/.global.functions.php");
///
//  Confirm the User has Admin Rights.
//fun_check_user_rights();
///
///////////////////
// START Pull Job Info from GET Requestto Auto fill Form ///
//   This function allows a Admin to Disable or enable a Account.
if ( isset($_GET['int_job_info']) ){
	$int_job_info = intval($_GET['int_job_info']);
	// Pull the Data from the Database
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	$str_sql = "SELECT `job_id`, `job_name`, `job_description`, `job_xp_value` FROM `jobs` WHERE `job_id` = '$int_job_info' ";
	$str_result = mysqli_query($str_dbConnect,$str_sql);
	// Build a table with the data given.
	while($ary_row = mysqli_fetch_array($str_result)) {
		echo '<p><label>XP Value : </label><label>' .  $ary_row['job_xp_value'] . '</label></p>';
        echo '<input name="int_job_id_2" type="hidden" value="' .  $ary_row['job_id'] . '" />';
        echo '<p><textarea name="job_description" cols="" rows="" readonly>' .  $ary_row['job_description'] . '</textarea></p>';
	}
}






///
// END User Request XP Control //
////////////////////////////////////////////////////////////////
?>