<?php
// Initialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['email'])) {
    header('Location: ../home/');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>GEMS</title>
        <link rel="stylesheet" type="text/css" href="../res/css/style.css" />
        <link rel="shortcut icon" href="../res/img/favicon.ico">
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <h3>User Login</h3>
        <form action="loginVerify.php" method="post">
            <table border="0">
                <tr><td>Email<abbr title="required">*</abbr></td><td><input type="text" name="email" size="20" required="required" placeholder="Email" /></td></tr>
                <tr><td>Password<abbr title="required">*</abbr></td><td><input type="password" name="password" size="20" required="required" placeholder="Password" /></td></tr>
                <tr><td>&nbsp;</td><td><input class="button red" type="submit" value="Login" /></td></tr>
            </table>
        </form>
        <?php
        if (isset($_GET['login_attempt']))
            echo '<p>wrong username or password, please try again</p>';
        ?>
        <p><a href="../signup">Signup</a></p>
        <p>a Wai Kit Lin production</p>
        <p><a href="../about">About</a></p>
        <p><a href="../contact">Contact</a></p>
    </body>
</html>