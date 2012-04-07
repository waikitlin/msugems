<?php

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

// Include database connection settings
include('config.inc.php');

// Get community service count according to the username
$sql = "SELECT * FROM event";
$result = mysql_query($sql);
$arr = mysql_num_rows($result);

//check if sql query is legit
if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

//check if there is result
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

//sql query listing
$i = 1;
echo "Listing all events created by all users: <br />";
while ($row = mysql_fetch_assoc($result)) {
    echo "NUMBER: " . $i;
    echo "USERNAME: ";
    echo $row["username"];
    echo " EVENTNAME: ";
    echo $row["eventname"];
    echo " EVENTTYPE: ";
    echo $row["eventtype"];
    echo " CREATED_ON: ";
    echo $row["created_on"];
    echo "<br />";
    $i++;
}

mysql_free_result($result);
?>
<p><a href="http://localhost:8080/msugems/securedpage.php">Secured Page</a></p>