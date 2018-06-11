<?php
////////////////////////////////////////////////////////////////
// START XP Request Page Content //
///
///////////////////
// Below used for testing
error_reporting(E_ALL);
ini_set("display_errors", true);
///////////////////
//  Import Global Funtions.
require($_SERVER["DOCUMENT_ROOT"].".functions/.global.functions.php");
///
//  Confirm the User has Admin Rights.
fun_check_user_rights();
///
///////////////////
/// START Request-XP-FORM Code ///
// Added Page Header
echo '<div class="header"><h1 class="header" align="center">XP Request</h1></div>';
// echo out the AJAX script used to dynamiclly update the form
echo '<script>
function fun_pull_job_info(str_job_name) {
    if (str_job_name == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET",".functions/.xp_request?job="+str_job_name,true);
        xmlhttp.send();
    }
}
</script>';




///
// END Request-XP-FORM Code ///
//

///////////////////
/// START  ///

///
// END  ///
//
// END XP Request Page Content //
////////////////////////////////////////////////////////////////
?>