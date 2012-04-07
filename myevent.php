<?php

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

// Include database connection settings
include('config.inc.php');

// Define $myusername
$myusername = $_SESSION['username'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$myusername = mysql_real_escape_string($myusername);

// Insert new user values into db
$sql = "SELECT eventname FROM event WHERE username = '$myusername'";

$queries = preg_split("/;+(?=([^'|^\\\']*['|\\\'][^'|^\\\']*['|\\\'])*[^'|^\\\']*[^'|^\\\']$)/", $sql);
foreach ($queries as $query) {
    if (strlen(trim($query)) > 0) {
        if (!mysql_query($query)) {
            die('mysql_error(): ' . mysql_error() . '<br /> mysql_errno(): ' . mysql_errno());
        }
    }
}
echo "Last line.";
?>