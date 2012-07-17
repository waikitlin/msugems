<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <?php
//***bug:solution:redirect this page elsewhere
// Include database connection settings
        require_once('../../res/config/config.php');

// Define $myusername and $mypassword
        $myfirstname = $_POST['first_name'];
        $mylastname = $_POST['last_name'];
        $myusername = $_POST['email'];
        $mypassword = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
// stripslashes
        $myfirstname = stripslashes($myfirstname);
        $mylastname = stripslashes($mylastname);
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
// mysql_real_escape_string
        $myfirstname = mysql_real_escape_string($myfirstname);
        $mylastname = mysql_real_escape_string($mylastname);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);

// Insert new user values into db
        $sql = "INSERT INTO $tbl_name (username, password, first_name, last_name)
VALUES
('$myusername','$mypassword','$myfirstname','$mylastname')";

        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
        echo "Congratulations! You have successfully signed up!";
        ?>
    </body>
</html>