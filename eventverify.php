<?php
// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

// Include database connection settings
include('config.inc.php');

// Define $myeventname 
$myeventname = $_POST['event_name'];
$myeventtype = $_POST['event_type'];
$myusername = $_SESSION['username'];
$myeventdesc = $_POST['event_desc'];

// To protect MySQL injection (more detail about MySQL injection)
$myeventname = stripslashes($myeventname);
$myeventname = mysql_real_escape_string($myeventname);
$myeventtype = stripslashes($myeventtype);
$myeventtype = mysql_real_escape_string($myeventtype);
$myusername = stripslashes($myusername);
$myusername = mysql_real_escape_string($myusername);

////remove white spaces in eventname
//$sPattern = '/\s*/m';
//$sReplace = '';
//$myeventnametrim = preg_replace($sPattern, $sReplace, $myeventname);
// Insert new user values into db
//$sql = "INSERT INTO event (username, eventname, eventtype) VALUES ('$myusername', '$myeventnametrim', '$myeventtype')";
$timezone = "Asia/Kuala_Lumpur";
if (function_exists('date_default_timezone_set'))
    date_default_timezone_set($timezone);
$sDate = date("Y-m-d H:i:s");
$sql = "INSERT INTO event (username, eventname, eventtype, description) VALUES ('$myusername', '$myeventname', '$myeventtype', '$myeventdesc');
UPDATE event SET created_on = '$sDate' WHERE eventname = '$myeventname';";

$queries = preg_split("/;+(?=([^'|^\\\']*['|\\\'][^'|^\\\']*['|\\\'])*[^'|^\\\']*[^'|^\\\']$)/", $sql);
foreach ($queries as $query) {
    if (strlen(trim($query)) > 0) {
        if (!mysql_query($query)) {
            if (mysql_errno() == $ER_DUP_ENTRY) {
                die('Event name used. Please use another. <p><a href="http://localhost:8080/msugems/createevent.php">Go back</a></p>');
            }
            die('mysql_error(): ' . mysql_error() . '<br /> mysql_errno(): ' . mysql_errno());
        }
    }
}
echo "Event created.";
echo $sDate;
?>
<p><a href="http://localhost:8080/msugems/profile.php">profile</a></p>