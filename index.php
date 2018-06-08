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
  <form action="/" method="post" enctype="multipart/form-data" name="adc_form"><input name="var_page" type="hidden" value="admin_console" /><input type="submit" value="Admin Control" /></form>
  <form action="/" method="post" enctype="multipart/form-data" name="xpr_form"><input name="var_page" type="hidden" value="xp_request" /><input type="submit" value="XP Request" /></form>
  <form action="/" method="post" enctype="multipart/form-data" name="xps_form"><input name="var_page" type="hidden" value="xp_score_board" /><input type="submit" value="XP Score Board" /></form>
</div>
<span style="font-size:30px;cursor:pointer" onclick="fun_openNav()">&#9776;</span>
<!-- END Side Navbar -->
<?php
session_start();
///
//  Load the requested page or defailt to the home page.
if ( isset($_POST["var_page"]) ) {
	require($_POST["var_page"] . ".php");
	unset($_POST["var_page"]);
}else{
	require("home.php");
}
?>
</body>
</html> 
