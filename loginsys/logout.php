<?php
// Start a session (if not already started)
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // If logged in, destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
