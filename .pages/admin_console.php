<?php
////////////////////////////////////////////////////////////////
// START Admin Control Page Content //
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
fun_check_admin_rights();
///
///////////////////
/// START Admin-Sub-Navbar-FORM Funtion Code ///
function fun_admin_navbar() {
	echo '
	<div class="header"><h1 class="header" align="center">Admin Console</h1></div>
	   <div class="header">
			<div class="sub-navbar" align="center">
			<!-- Sub-Navbar button to load user_contols form -->
				<form action="/" method="post" enctype="multipart/form-data" name="open_admin_user_control_form">
					<input name="var_page" type="hidden" value="admin_console" />
					<input name="var_admin_page" type="hidden" value="admin_user_control_page" />
					<input name="admin_user_controls" type="submit" value="User Controls" style="border-left-width:1px;background-color: #172FB2;" />
				</form>
			<!-- Sub-Navbar button to load review_tickets form -->
				<form action="/" method="post" enctype="multipart/form-data" name="open_admin_review_tickets_form">
					<input name="var_page" type="hidden" value="admin_console" />
					<input name="var_admin_page" type="hidden" value="admin_review_ticket_page" />
					<input name="admin_review_tickets" type="submit" value="Review Tickets" />
				</form>
		   <!-- Sub-Navbar button to load pool_data_form form -->
				<form action="/" method="post" enctype="multipart/form-data" name="open_admin_cash_pool_form">
					<input name="var_page" type="hidden" value="admin_console" />
					<input name="var_admin_page" type="hidden" value="admin_cash_pool_page" />
					<input name="admin_cash_pool" type="submit" value="Cash Pool" />
				</form>
		   <!-- Sub-Navbar button to load jobs_form form -->
				<form action="/" method="post" enctype="multipart/form-data" name="open_admin_jobs_form">
					<input name="var_page" type="hidden" value="admin_console" />
					<input name="var_admin_page" type="hidden" value="admin_jobs_page" />
					<input name="admin_jobs" type="submit" value="Jobs" />
				</form>
		   <!-- Sub-Navbar button to load admin_other_setting form -->
				<form action="/" method="post" enctype="multipart/form-data" name="open_admin_other_setting_form">
					<input name="var_page" type="hidden" value="admin_console" />
					<input name="var_admin_page" type="hidden" value="admin_other_setting_page" />
					<input name="admin_other_setting" type="submit" value="Settings" />
				</form>
			</div>
    </div>
	';	
}
///
// END Admin-Sub-Navbar-FORM Funtion Code ///
//
///////////////////
// START Admin-User-Control-FORM Funtion Code ///
function fun_admin_user_control_form() {
	// Import required files to run and start the seasion.
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	// Echo out the first part of the form.
 	echo ' <table border="1" cellpadding="1">
        <tr>
        	<td><label>Disable a User</label></td>
        </tr>
        <tr>
        <td><form action="/.functions/.admin_user_controls" method="post" enctype="multipart/form-data" name="admin_disable_user_form">
            <select name="ary_user_list">';
	// The echo stoped at the "Select form, so a databaser call can be made to build the select box the all the "username"s and "user_id"s.	
	// Connect to the database and look up if a Username and password match the provided credentials.
	$str_sql = "SELECT `user_id`, `username` FROM `user_data`";
	$str_result = mysqli_query($str_dbConnect,$str_sql);
	// While there are rows in of retreaved username data, echo data into the selcet box.
	while($ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC)) {
		echo '<option value="' . $ary_row['user_id'] .'">' . $ary_row['username'] . '</option>';
	}
	// All users added to select box. Finish echoing the form out.
	echo '</select>
            <br /><input name="admin_submit_disable_user" type="submit" value="Disable User" />
        </form></td>
        </tr>
	</table>
 	<table border="1" cellpadding="1">
        <tr>
        	<td><label>Add a New User</label></td>
        </tr>
        <tr>
        <td><form action="/.functions/.admin_user_controls" method="post" enctype="multipart/form-data" name="admin_submit_new_user_form">
        	<input name="str_new_username" type="text" placeholder="New Username" maxlength="15" required />
            <br /><input name="str_new_users_email" type="text" placeholder="Users Email Address" maxlength="128" required />
            <br /><label>Admin Rights</label><input name="bln_admin_rights" type="checkbox" value="True" />
            <br /><br /><input name="admin_submit_add_user" type="submit" value="Add User" />
        </form></td>
        </tr>
	</table>';
}
///
/// END Admin-User-Control-FORM Funtion Code ///
//
///////////////////
/// START Admin-Review-Tickets-FORM Funtion Code ///
function fun_admin_review_tickets_form() {
	echo "admin_review_tickets_form";
}
///
/// END Admin-Review-Tickets-FORM Funtion Code ///
//
///////////////////
/// START Admin-Cash_Pool-FORM Funtion Code ///
function fun_admin_cash_pool_form() {
	echo "admin_cash_pool_form";
}
///
/// END Admin-Cash_Pool-FORM Funtion Code ///
//
///////////////////
/// START Admin-JOBS-FORM Funtion Code ///
function fun_admin_jobs_form() {
	echo "admin_jobs_form";
}
///
/// END Admin-JOBS-FORM Funtion Code ///
//
///////////////////
/// START Admin-Other-Setting-FORM Funtion Code ///
function fun_admin_other_setting_form() {
	echo "admin_other_settings_form";
}
///
/// END Admin-Other-Setting-FORM Funtion Code ///
//
///////////////////
// START ACTUAL Page Content //
/// Add DIV wraper for style and content layout controls.
echo '<div class="homepage-container">';
// Input this pages sub-navbar
fun_admin_navbar();
///
echo '<div class="content">'; /// START of the div class="content"
/// Main form will be loaded below.
////
// Check if "$_POST["var_admin_page"]" empty. If yes, give it the "default" for next swicth statment.
if(!isset($_POST["var_admin_page"])) {
    $_POST["var_admin_page"] = "default";
}
// Check the "$_POST["var_admin_page"]" to see what form to load.
switch ($_POST["var_admin_page"]) {
	case "admin_user_control_page":
		fun_admin_user_control_form();
		break;
	case "admin_review_ticket_page":
		fun_admin_review_tickets_form();
		break;
	case "admin_cash_pool_page":
		fun_admin_cash_pool_form();
		break;
	case "admin_jobs_page":
		fun_admin_jobs_form();
		break;
	case "admin_other_setting_page":
		fun_admin_other_setting_form();
		break;
	default:
		fun_admin_review_tickets_form();
}
///
echo '</div></div>'; /// END of the div class="content"
///
// END Admin Control Page Content //
////////////////////////////////////////////////////////////////
?>