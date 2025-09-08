<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body{
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <h1>Welcome Page</h1>
    <?php
    echo "Welcome: ". $_SESSION['username'];
    ?>

    <a href="logout.php">Logout here</a>
</body>
</html>