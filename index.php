<?php
// Initialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
    header('Location: securedpage.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MSU GEMS</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <link rel="shortcut icon" href="stylesheets/images/favicon.ico">
    </head>
    <body>
        <h3>Sign up here!</h3>
        <form action="signupverify.php" method="post">
            <table>
                <tr><td>Email<abbr title="required">*</abbr></td><td><input name="user_email" type="text" value="" size="50" maxlength="255" required="required" /></td></tr>
                <tr><td>Password<abbr title="required">*</abbr></td><td><input name="user_password" type="password" size="50" maxlength="25" required="required" /></td></tr>
                <tr><td>&nbsp;</td><td><input class="button green" type="submit" value="Signup" /></td></tr>
            </table>
        </form>
        <h3>User Login</h3>
        <form action="loginproc.php" method="post">
            <table border="0">
                <tr><td>Username<abbr title="required">*</abbr></td><td><input type="text" name="username" size="20" required="required" /></td></tr>
                <tr><td>Password<abbr title="required">*</abbr></td><td><input type="password" name="password" size="20" required="required" /></td></tr>
                <tr><td>&nbsp;</td><td><input class="button red" type="submit" value="Login" /></td></tr>
            </table>
        </form>
        <?php
        if (isset($_GET['login_attempt']))
            echo '<p>wrong username or password, please try again</p>';
        ?>
        <p><font size="2" class="tahoma">a Wai Kit Lin production</font></p>
        <p><a href="http://localhost:8080/msugems/about.php">About</a></p>
        <p><a href="http://localhost:8080/msugems/contact.php">Contact</a></p>
    </body>
</html>