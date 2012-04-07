<?php
//***bug:solution:redirect this page elsewhere
// Include database connection settings
include('config.inc.php');

// Define $myusername and $mypassword 
$myusername = $_POST['user_email'];
$mypassword = $_POST['user_password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

// Insert new user values into db
$sql = "INSERT INTO $tbl_name (username, password)
VALUES
('$myusername','$mypassword')";

if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}
echo "Congratulations! You have successfully signed up!";
?>