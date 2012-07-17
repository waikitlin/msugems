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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="../res/css/style.css" />
        <link rel="shortcut icon" href="../res/img/favicon.ico">
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <h3>Sign up here!</h3>
        <form action="signupVerify.php" method="post">
            <table>
                <tr><td>First name<abbr title="required">*</abbr></td><td><input name="first_name" type="text" size="50" maxlength="25" required="required" placeholder="First name" /></td></tr>
                <tr><td>Last name</td><td><input name="last_name" type="text" size="50" maxlength="25" placeholder="Last name" /></td></tr>
                <tr><td>Email<abbr title="required">*</abbr></td><td><input name="email" type="text" value="" size="50" maxlength="255" required="required" placeholder="Email" /></td></tr>
                <tr><td>Password<abbr title="required">*</abbr></td><td><input name="password" type="password" size="50" maxlength="25" required="required" placeholder="Password" /></td></tr>
                <tr><td>&nbsp;</td><td><input class="button green" type="submit" value="Signup" /></td></tr>
                <tr><td>&nbsp;</td><td>*required fields</td></tr>
            </table>
        </form>
    </body>
</html>