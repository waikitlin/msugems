<?php

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
    header('Location: ../login');
}

// Include database connection settings
include('config.inc.php');

$sDate = date("Y-m-d H:i:s");
mysql_query("insert into event set created_on = '$sDate'");
?>