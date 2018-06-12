<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<style> @import "/styles/main_template.css";</style>
<div class="homepage-container">

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
  	<div class="content">
   <!--
<table border="0" cellpadding="10" align="center">
  <tr><td align="center">
    <label >Add New Job</label>
   </td></tr>
  <tr><td>
    <form action="/.functions/.jobs_controler" method="post" enctype="multipart/form-data" name="submit_new_job_form" >
        <p><input autofocus="autofocus" tabindex="0" name="str_job_name" type="text" maxlength="127" placeholder="New Job Name" /></p>
        <p><textarea name="str_job_description" cols="50" rows="15" placeholder="New Job Description"></textarea></p>
        <p><label>XP Value</label>
        <input name="int_xp_value" type="text" size="8" maxlength="8" /><br />
        <input name="var_page" type="hidden" value="admin_console" /></p>
		<input name="admin_submit_new_job" type="submit" value="Submit" /
    </form>
    </td></tr>
</table>
--->

<table border="0" cellpadding="10" align="center">
  <tr><td align="center">
    <label >Request XP</label>
   </td></tr>
  <tr><td>
    <form action="/.functions/.xp_request" method="post" enctype="multipart/form-data" name="submit_xp_request_form" >
<?php

echo '<script>
function fun_pull_job_info(str_job_name) {
    if (str_job_name == "") {
        document.getElementById("str_job_info").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // Browser older. I should not even support this.
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("str_job_info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET",".functions/.xp_request?int_job_info="+str_job_name,true);
        xmlhttp.send();
    }
}
</script>';

echo'<select name="ary_jobs_list" onchange="fun_pull_job_info(this.value)">
<option value="">Select a Job</option>';
// Connect to the database build a select box with all active jobs.
require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
$str_sql = "SELECT `job_name`, `job_id` FROM `jobs` WHERE `job_active` = 1 ";
$str_result = mysqli_query($str_dbConnect,$str_sql);
// While there are rows in of retreaved username data, echo data into the selcet box.
while($ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC)) {
	echo '<option value="' . $ary_row['job_id'] .'">' . $ary_row['job_name'] . '</option>';
}
echo '</select><br />';
?>

        <input name="var_page" type="hidden" value="admin_console" />
        <p><input autofocus="autofocus" tabindex="0" name="int_ticket_number" type="text" maxlength="127" placeholder="Ticket Number" /></p>
        <p><label>Bonus XP Request Value</label><br />
        <input name="int_bonus_xp_request_value" type="text" size="8" maxlength="8" /></p>        
        <p><textarea name="str_bonus_request_reason" cols="30" rows="5" placeholder="Bonus Request Reason"></textarea></p>
        <input name="user_submit_xp_request" type="submit" value="Submit" />        
        <div id="str_job_info" class="content"><b>Job Description...</b></div>
    </form>
    </td></tr>
</table>



	</div>
<div class="footer" align="center">DC XP Tracker &copy; <a href="https://BretStaton.com"  style="color:white;">Bret Staton</a></div>
</div>


