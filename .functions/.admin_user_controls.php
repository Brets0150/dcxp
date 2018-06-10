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
//  Import Global Funtions.
require($_SERVER["DOCUMENT_ROOT"].".functions/.global.functions.php");
///
//  Confirm the User has Admin Rights.
fun_check_admin_rights();
///
///////////////////
// START Add a new User to the Database Code ///
if ( isset($_POST['admin_submit_add_user']) ) {
	//
	// Check if Username and Password were given. If not return to Login page with error code.
	if ( ((isset($_POST["str_new_username"])) && (!empty($_POST["str_new_username"]))) &&
		((isset($_POST["str_new_users_email"])) && (!empty($_POST["str_new_users_email"]))) ) {
		///
		// Clean the input data
		$str_new_username = fun_clean_input_data($_POST["str_new_username"]);
		$str_new_users_email = fun_clean_input_data($_POST["str_new_users_email"]);
		// Check the "bln_admin_rights" variable. If the check box weas not set, set the Admin Rights to False.
		if ( !empty($_POST["bln_admin_rights"]) ) {
			$bln_admin_rights = fun_clean_input_data($_POST["bln_admin_rights"]);
			settype($bln_admin_rights, "bool");
		} else {
			$bln_admin_rights = false;
			settype($bln_admin_rights, "bool");
		}
		///
		//  After Cleaning the data check if the valuse are still there. If not the data was not clean in someway.
		if ( (empty($str_new_username)) || (empty($str_new_users_email)) ) {
			fun_error("admin_console", htmlentities("Data not Clean. EMAIL: ". $str_new_users_email . "  USERNAME: ". $str_new_username));
		}
		///
		//  Check if the Email at least looks a real one.
		if ( filter_var($str_new_users_email, FILTER_VALIDATE_EMAIL) ) {
			//  The Email address looks real.
			///
			// Connect to the database and check if Username or email address are already in use.
			require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
			$str_sql = "SELECT `user_id` FROM `user_data` WHERE `username` = '$str_new_username' OR `user_email` = '$str_new_users_email' ";
			$str_result = mysqli_query($str_dbConnect,$str_sql);
			$ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC);
			$int_count = mysqli_num_rows($str_result);
			settype($int_count, "integer");
			///
			// If "1" or more records found then Email or Username are in use already.
			if ( $int_count > 0 ) {
				fun_error("admin_console", "Username or Email already exist.");
			} else { // Username and email are not in DB already. Continue to add User.
				$bln_email_and_user_check_good = true;
				settype($bln_email_and_user_check_good);
			}
			// Clean the Mysql variable  to make sure the new ones will be clean
			unset($str_sql, $str_result, $ary_row, $int_count);
			//  All check on data done. We can now put the New User into the database. ///
			///
			//  Check if all the Data checks have been passed.
			if ( ($bln_email_and_user_check_good) && isset($bln_admin_rights) ){
				// All data looks good.
				///
				//  Creat a new random password for the new user. 
				settype(($int_password_lenth = 8), "integer");
				settype(($str_chars_to_use_in_passwrord = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*-=+?"), "strig");
				settype(($str_new_users_password = substr( str_shuffle( $str_chars_to_use_in_passwrord ), 0, $int_password_lenth )), "string");
				// Now make a MD5 of the password for the Database.
				$str_new_users_password_md5 = md5($str_new_users_password);
				/// Set the account as active
				settype(($bln_account_active = true), "bool");
				// Insert the new user into the database.
				$str_sql = "INSERT INTO `user_data`(`username`, `md5_password`, `user_email`, `admin_rights`, `account_active`)
				VALUES ('$str_new_username','$str_new_users_password_md5','$str_new_users_email','$bln_admin_rights','$bln_account_active')";
				///
				// Copnnect to the DB and INSERT the new user record.
				if ( !mysqli_query($str_dbConnect,$str_sql) ) {
					mysqli_close($con);
					fun_error("admin_console", "Failed to insert the User into the Database" );
				} else { // connetion to DB all good
					mysqli_close($con);
					// FINALLY, the new user has been added into the database. Report the success and give the new users password to the admin.
					fun_message_redirect("admin_console","Successfully added " . $str_new_username . 
					".  " . $str_new_username . ' new password is "' . $str_new_users_password . '", without the quote marks.');
				}
				///
			} else { // Either the Username or Email address checks failed, or the "$bln_admin_rights" is not set correctly
				fun_error("admin_console", "A final data check for Username, Email, or User Rights Failed");
			}
			///
		} else { // The Email address does not look to be a real one.
			fun_error("admin_console", "Error: Email Address looks to be invalid.");
		}
		///
	} else { // Username ro Email where not given. Return to Home Page with error.
		fun_error("admin_console", "Error: Email Address or Username are empty.");
	}
}
///
// END Admin User Account Control //
////////////////////////////////////////////////////////////////
?>