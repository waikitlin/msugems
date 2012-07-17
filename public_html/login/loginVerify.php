<?php

//***bug:takes user to securedpage without signing in
// Initialize session
session_start();

// Include database connection settings
require_once('../../res/config/config.php');

// Define $myusername and $mypassword
$myemail = $_POST['email'];
$mypassword = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail = mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);

$sql = "SELECT * FROM $tbl_name WHERE email='$myemail' and password='$mypassword'";
$login = mysql_query($sql);

// Check username and password match
if (mysql_num_rows($login) == 1) {
    // Set username session variable
    $_SESSION['email'] = $myemail;
    // Jump to secured page
    header('Location: ../home/');
} else {
    // Jump to login page
    header('Location: login.php?login_attempt=true');
}
?>