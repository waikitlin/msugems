<?php
//***bug:takes user to securedpage without signing in
// Initialize session
session_start();

// Include database connection settings
include('config.inc.php');

// Define $myusername and $mypassword 
$myusername = $_POST['username'];
$mypassword = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$login = mysql_query($sql);

// Check username and password match
if (mysql_num_rows($login) == 1) {
    // Set username session variable
    $_SESSION['username'] = $myusername;
    // Jump to secured page
    header('Location: securedpage.php');
} else {
    // Jump to login page
    header('Location: index.php?login_attempt=true');
}
?>