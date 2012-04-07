<?php
// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secured Page</title>
    </head>
    <body>
        <p>This is secured page with session: <b><?php echo $_SESSION['username']; ?></b>
            <br />You can put your restricted information here.</p>
        <p><a href="createevent.php">Create Event</a></p>
        <p><a href="profile.php">Profile Page</a></p>
        <p><a href="listevent.php">List Event </a></p>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>