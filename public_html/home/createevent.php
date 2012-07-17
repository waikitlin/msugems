<?php
// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
    header('Location: ../login');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Event</title>
    </head>
    <body>
        <p><a href="../login">Home</a></p>
        <form action="eventverify.php" method="post">
            <table>
                <tr><td>Event Name <input name="event_name" type="text" value="" size="50" maxlength="255" /></td>
                <tr><td>Event Type
                        <select name="event_type">
                            <option value="cs">Community Service</option>
                            <option value="pe">Personal Enrichment</option>
                        </select>
                    </td>
                </tr>
                <tr><td>Event Description <input name="event_desc" type="text" value="" size="150" maxlength="5000" /></td>
                <tr><td><input type="submit" value="Create" /></td></tr>
            </table>
        </form>
    </body>
</html>