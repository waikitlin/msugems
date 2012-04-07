<?php

// Include database connection settings
$host = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = "root"; // Mysql password 
$db_name = "mydb"; // Database name 
$tbl_name = "user"; // Table name 
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die("cannot select DB");

//MYSQL ERROR CODE
$ER_DUP_ENTRY = 1062;

?>