<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- START HTML HEADER -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DC-XP Tracker</title>
<style> @import "/styles/main_template.css"; </style>
<script>
// START Side Navbar control functions ///
function fun_openNav() {
    document.getElementById("Sidenav").style.width = "250px";
} 
function fun_closeNav() {
    document.getElementById("Sidenav").style.width = "0";
}
// End Side Navbar control functions //
</script>
</head>
<!-- END HTML HEADER -->
<body>
<!-- START Side Navbar -->
<div id="Sidenav" class="sidenav">
  <a href="javascript:void(0)" class="btn_close" onclick="fun_closeNav()">&times;</a>
<?php 
///
// Build the Navbar base on; 1. A user is logged in; and  2. If the User has Admin rights.
session_start();
if (isset($_SESSION["str_username"])) {
	// If User logged in display UserName.
	echo "User: ".$_SESSION["str_username"];
	echo '<form action="/" method="post" enctype="multipart/form-data" name="xpr_form"><input name="var_page" type="hidden" value="xp_request" /><input type="submit" value="XP Request" /></form>';
	echo '<form action="/" method="post" enctype="multipart/form-data" name="xps_form"><input name="var_page" type="hidden" value="xp_score_board" /><input type="submit" value="Score Board" /></form>';
	// If admin status show admin_control link.
	if ($_SESSION["bln_admin"]) {
		echo '<form action="/" method="post" enctype="multipart/form-data" name="adc_form"><input name="var_page" type="hidden" value="admin_console" /><input type="submit" value="Admin Control" /></form>';
	}
	// Logout Button
	echo '<form action="/.functions/.login" method="post" enctype="multipart/form-data" name="logout_form">
	<input name="bln_logout" type="hidden" value="TRUE" /><input type="submit" value="Logout" /></form>';
} else {
	// ELSE If User not logged in display login prompt using the "fun_login_form()" funtion.
	require($_SERVER["DOCUMENT_ROOT"].".functions/.login.php");
	fun_login_form();
}
///
?>
</div>
<span style="font-size:30px;cursor:pointer" onclick="fun_openNav()">&#9776;</span>
<!-- END Side Navbar -->
<?php
///
//  If there are any Error codes display them here. Then clear the error code.
if ( isset($_SESSION["str_error_code"]) ) {
	echo $_SESSION["str_error_code"] ;
	unset($_SESSION["str_error_code"]) ;
}
///
//  If there are any session mesaages display them here.
if ( isset($_SESSION["str_message"]) ) {
	echo $_SESSION["str_message"] ;
	unset($_SESSION["str_message"]) ;
}
///
//  Load the requested page or defailt to the home page.
//    This method will pull in the code need for diffrent pages
//    insted of loading a whole new page and having repetitive code.
if ( isset($_POST["var_page"]) ) {
	require($_POST["var_page"] . ".php");
	unset($_POST["var_page"]);
}else{
	require("home.php");
}
///
?>
</body>
</html> 
