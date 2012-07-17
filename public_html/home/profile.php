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
        include('../../res/config/config.php');

// Get community service count according to the username
        $myusername = $_SESSION['email'];
        $sql = "SELECT eventname FROM event WHERE username = '$myusername'";
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
            //exit;
        }

// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
        else {
            echo "My created event(s): <br />";
            $i = 1;
            while ($row = mysql_fetch_assoc($result)) {
                echo "Event " . $i . ": ";
                echo $row["eventname"];
                echo "<br />";
                $i++;
            }
            mysql_free_result($result);
        }
        ?>
    </body>
</html>