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
// START Add New Job To the Data Base ///
///
if ( isset($_POST['admin_submit_new_job']) ) {
	// Make sure all form Data was filled out and passed.
	if ( (!empty($_POST['int_xp_value'])) && (!empty($_POST['str_job_name'])) && (!empty($_POST['str_job_description'])) ) {
		// All needed Data was passed.
		///
		// Clean the data.
		
	} else { // One of the form fields were not filled in.
		fun_error("admin_console", "ERROR: Not all form fields were filled out. Please fill out all fields and submit again.");
	}
}
/// END Add New Job To the Data Base  ///
//
///////////////////
// START EDIT Job in the Data Base ///
///
if ( isset($_POST['admin_edit_job']) ) {
	
}
/// END EDIT Job in the Data Base ///
//
///////////////////
// START LOAD a Job to be edited from the Data Base ///
///
if ( isset($_POST['admin_load_job']) ) {
	
}
/// END LOAD a Job to be edited from the Data Base  ///
//
///
// END Global Functions //
////////////////////////////////////////////////////////////////