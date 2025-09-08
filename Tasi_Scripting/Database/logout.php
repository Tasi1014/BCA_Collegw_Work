<?php
session_start();        // Start the session
unset($_SESSION['username']);

header('Location: login.php'); // Redirect to login page

exit();

?>