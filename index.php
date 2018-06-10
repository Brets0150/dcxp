<?php 
////////////////////////////////////////////////////////////////
// START Main INDEX Page ///
///
// Import Header
require(".pages/header.php");
///
///////// START Side Navbar /////////
//  Start with top of the side Navbar, style "div.sidenav".
echo'<div id="Sidenav" class="sidenav">
<a href="javascript:void(0)" class="btn_close" onclick="fun_closeNav()">&times;</a>';
///
// Build the Navbar base on; 1. A user is logged in; and  2. If the User has Admin rights.
session_start();
// Check if a User is already logged in.
if (isset($_SESSION["str_username"])) {
	// If User logged in display UserName.
	echo '<h1 style="padding: 10px 10px 10px 32px;background-color: #172FB2;text-decoration: none;font-size: 25px;color: white;transition: 0.3s;border: none;">
	<u>User:&nbsp;&nbsp;'.$_SESSION["str_username"].'</u></h1>';
	echo '<form action="/" method="post" enctype="multipart/form-data" name="xpr_form"><input name="var_page" type="hidden" value="xp_request" /><input type="submit" value="XP Request" /></form>';
	echo '<form action="/" method="post" enctype="multipart/form-data" name="xps_form"><input name="var_page" type="hidden" value="xp_score_board" /><input type="submit" value="Score Board" /></form>';
	// If admin status show admin_control link.
	if ($_SESSION["bln_admin"]) {
		echo '<form action="/" method="post" enctype="multipart/form-data" name="adc_form"><input name="var_page" type="hidden" value="admin_console" /><input type="submit" value="Admin Control" /></form>';
	}
	// Logout Button
	echo '<form action="/.functions/.login" method="post" enctype="multipart/form-data" name="logout_form">
	<input name="bln_logout" type="hidden" value="TRUE" /><input type="submit" value="Logout" /></form>';
///
} else {
	// ELSE If User not logged in display login prompt using the "fun_login_form()" funtion.
	require($_SERVER["DOCUMENT_ROOT"].".functions/.login.php");
	fun_login_form();
}
// Echo out end of div.sidenav
echo '</div><span style="font-size:30px;cursor:pointer" onclick="fun_openNav()">&#9776;</span></div><div id="main">';
///
/////////  END Side Navbar /////////
///
//  If there are any Error codes display them here. Then clear the error code.
if ( isset($_SESSION["str_error_code"]) ) {
	echo '<h3 style="color: red">' . $_SESSION["str_error_code"]  .'</h3>';
	unset($_SESSION["str_error_code"]) ;
}
///
//  If there are any session mesaages display them here.
if ( isset($_SESSION["str_message"]) ) {
	echo '<h3 style="color: white">' . $_SESSION["str_message"] .'</h3>';
	unset($_SESSION["str_message"]) ;
}
///
//  Load the requested page or default to the home page.
//    This method will pull in the code need for diffrent pages
//    insted of loading a whole new page and having repetitive code.
if ( isset($_POST["var_page"]) ) {
	require(".pages/" . $_POST["var_page"] . ".php");
	unset($_POST["var_page"]);
}else{
	require(".pages/home.php");
}
///
// Load Footer
require(".pages/footer.php")
///
// END Main INDEX Page ///
////////////////////////////////////////////////////////////////
?>
