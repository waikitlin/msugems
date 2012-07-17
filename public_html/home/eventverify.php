<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <?php
// Initialize session
        session_start();

// Check, if username session is NOT set then this page will jump to login page
        if (!isset($_SESSION['email'])) {
            header('Location: ../login');
        }

// Include database connection settings
        require_once('../../res/config/config.php');

// Define $myeventname
        $myeventname = $_POST['event_name'];
        $myeventtype = $_POST['event_type'];
        $myeventdesc = $_POST['event_desc'];
        $email = $_SESSION['email'];

// To protect MySQL injection (more detail about MySQL injection)
        $myeventname = stripslashes($myeventname);
        $myeventname = mysql_real_escape_string($myeventname);
        $myeventtype = stripslashes($myeventtype);
        $myeventtype = mysql_real_escape_string($myeventtype);
        $email = stripslashes($email);
        $email = mysql_real_escape_string($email);

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
        $sql = "INSERT INTO event (name, type, description, fk_email) VALUES ('$myeventname', '$myeventtype', '$myeventdesc', '$email');
UPDATE event SET created_on = '$sDate' WHERE name = '$myeventname';";

        $queries = preg_split("/;+(?=([^'|^\\\']*['|\\\'][^'|^\\\']*['|\\\'])*[^'|^\\\']*[^'|^\\\']$)/", $sql);
        foreach ($queries as $query) {
            if (strlen(trim($query)) > 0) {
                if (!mysql_query($query)) {
                    if (mysql_errno() == $ER_DUP_ENTRY) {
                        die('Event name used. Please use another.');
                    }
                    die('mysql_error(): ' . mysql_error() . '<br /> mysql_errno(): ' . mysql_errno());
                }
            }
        }
        echo "Event created.";
        echo $sDate;
        ?>
    </body>
</html>