<?php
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// This file supliys the MySQL connection details. This fille
// is loaded whenever a MySQL database connection is needed.
//
// This file need to be kept secure. Make sure it has the
// permisison of "chmod 550". 
//
//  Update the below with your database connection infomation. 
//  Then rename the file to ".sql.php".
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
$str_DataBaseName="YOUR_DATABASE_NAME";
$str_DataBaseUser="YOUR_DATABASE_USERNAME";
$str_DataBasePass="YOUR_DATABASE_PASSWORD";
$str_DataBaseServer="localhost";
$str_dbConnect=mysqli_connect($DataBaseServer, $DataBaseUser, $DataBasePass, $DataBaseName);
?>
