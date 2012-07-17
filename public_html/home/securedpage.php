<?php
// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
    header('Location: login/index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <p>Welcome, <b><?php echo $_SESSION['email']; ?></b>!</p>
        <p><a href="createevent.php">Create Event</a></p>
        <p><a href="profile.php">Profile Page</a></p>
        <p><a href="listevent.php">List Event </a></p>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>