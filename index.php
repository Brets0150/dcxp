<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DC-XP Tracker</title>
<style>
body {
	font-family: "Lato", sans-serif;
	background-color: #57677f;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #004ECC;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #4C91FF;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .btn_close {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
body,td,th {
	font-family: Lato, sans-serif;
}
</style>
<script>
// START Side Navbar control functions ///
// Open the Side Navbar function //
function fun_openNav() {
    document.getElementById("Sidenav").style.width = "250px";
} 
// Close the Side Navbar function //
function fun_closeNav() {
    document.getElementById("Sidenav").style.width = "0";
}
// End Side Navbar control functions //
</script>
</head>
<body>
<!-- START Side Navbar -->
<div id="Sidenav" class="sidenav">
  <a href="javascript:void(0)" class="btn_close" onclick="fun_closeNav()">&times;</a>
  <a href="#">Admin Control</a>
  <a href="#">XP Request</a>
  <a href="#">XP Score Board</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="fun_openNav()">&#9776;</span>
<!-- END Side Navbar -->

</body>
</html> 
