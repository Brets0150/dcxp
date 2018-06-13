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
<?php

///////////////////
// START SUBMIT To Cash Pool Form ///
//   This form will allow the Admin is submit cash to the cash pool.
echo '
<table border="0" cellpadding="10" align="center"><tr align="left"><td>
<form action="/.functions/.test" method="post" enctype="multipart/form-data" name="admin_submit_cash_pool">';
// Create a select box that auto sets to the current month.
echo '
<p><label> Cash Pool Date<label><br/>
<select name="int_cash_pool_month">';
foreach(range('1', '12') as $int_month) {
	echo '<option value="'. $int_month . '"';
	if ( date('n') == $int_month ) { 
		echo 'selected="selected"'; 
	}
	echo '>'. $int_month . '</option>';
}
echo '</select>';
///
// Create a select box that auto sets to the current year.
echo '<select name="int_cash_pool_year">';
foreach(range('2015', '2025') as $int_year) {
	echo '<option value="'. $int_year . '"';
	if ( date('Y') == $int_year ) { 
		echo 'selected="selected"'; 
	}
	echo '>'. $int_year . '</option>';
}
echo '</select></p>
<p><label>$$$Cash Pool Amount<label><br />
<input name="int_usd_cash_amount" type="number" size="8" maxlength="8" placeholder="$$$$"/>
</td></tr></table>
</form>';



// Connect to the database build a select box with all active jobs.
require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
$str_sql = "SELECT `cash_pool_id`, `cash_pool_month`, `cash_pool_year`, `cash_pool_value` FROM `cash_pool_table` LIMIT 25";
$str_result = mysqli_query($str_dbConnect,$str_sql);

echo '<table border="0" cellpadding="10">
	  <tr>
		<td>Date</td>
		<td>$Cash Amount$</td>
		<td>&nbsp;</td>
	  </tr>';
// While there are rows in of retreaved username data, echo data into the selcet box.
while($ary_row = mysqli_fetch_array($str_result,MYSQLI_ASSOC)) {
	echo '	
	  <tr>
		<td>'.$ary_row['cash_pool_month']. '/' .$ary_row['cash_pool_year'] .'</td>
		<td>'.$ary_row['cash_pool_value']. '</td>
		<td>
		<form action="" method="post" enctype="multipart/form-data" name="delete_cash_pool">
		<input name="int_cash_pool_id" type="hidden" value="'.$ary_row['cash_pool_id'].'" />
		<input name="submit_cash_pool_delete" type="submit" />
		</form>
		</td>
	  </tr>';
}
echo '</table>';
/// 
// END of the SUBMIT Cash Pool.
?>

</div>
<div class="footer" align="center">DC XP Tracker &copy; <a href="https://BretStaton.com"  style="color:white;">Bret Staton</a></div>
</div>


<!-----

///////////////////
// START Pull Job Info from GET Requestto Auto fill Form ///
//   This function allows a Admin to Disable or enable a Account.
if ( isset($_GET['int_cash_pool_date']) ){
	$int_cash_pool_date = intval($_GET['int_cash_pool_date']);
	fun_check_db_for_existing_values($str_sql) 
	// Pull the Data from the Database
	require($_SERVER["DOCUMENT_ROOT"].".config/.sql.php");
	$str_sql = "SELECT `cash_pool_id` FROM `cash_pool_table` WHERE `cash_pool_month` = '' AND `cash_pool_year` = ''";
	
	$str_sql      = "SELECT `job_id`, `job_name`, `job_description`, `job_xp_value` FROM `jobs` WHERE `job_id` = '$int_job_info' ";
	$str_result   = mysqli_query($str_dbConnect,$str_sql);
	// Build a table with the data given.
	while($ary_row = mysqli_fetch_array($str_result)) {
		
	}
}
/// END Pull Job Info from GET Requestto Auto fill Form  ///
//

echo '<script>
///////////////////
/// START Dynamic Cash Pool Update Function ///
//   Facilitates pulling info the the database with changes on the form occure.
///
function fun_pull_pool_data(int_cp_month,int_cp_year ) {
    if (int_cash_pool_date == "") {
        document.getElementById("int_cash_pool_date").innerHTML = "";
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
                document.getElementById("int_cash_pool_date").innerHTML = this.responseText;
            }
        };
		// Connects to the backend script to get the data about the job. This auto fills the area
		//   Below the form with the info about the job.
        xmlhttp.open("GET","?int_cp_month=" +int_cp_month +"&int_cp_year="+ int_cp_month,true);
        xmlhttp.send();
    }
}
///
// END Dynamic Job Description Update Function  ///
//
</script>';


--->