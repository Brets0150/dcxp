<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<style> @import "/styles/home.css";</style>
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
 	<table border="1" cellpadding="1">
        <tr>
        	<td><label>Disable a User</label></td>
        </tr>
        <tr>
        <td><form action="/.functions/.admin_user_controls" method="post" enctype="multipart/form-data" name="admin_disable_user_form">
            <select name="ary_user_list">
            <?php
            	<option value="user_id">Username</option>
            
            ?>
              <option value="user_id">Username</option>
            </select>
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
            <br /><label>Admin Rights</label><input name="Admin Rights?" type="checkbox" value="admin_rights" />
            <br /><br /><input name="admin_submit_add_user" type="submit" value="Add User" />
        </form></td>
        </tr>
	</table>


	</div>


<div class="footer" align="center">DC XP Tracker &copy; <a href="https://BretStaton.com"  style="color:white;">Bret Staton</a></div>
</div>


