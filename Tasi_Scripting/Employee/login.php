<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: welcome.php');
    exit();
}

$name = $password = "";

include 'connection.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Username
    if (!empty($_POST['name']) && preg_match('/^[A-Za-z ]{3,15}$/', trim($_POST['name']))) {
        $name = trim($_POST['name']);
    } else {
        $errors['name'] = "Username must be 3-15 alphabetic characters.";
    }


    if (!empty($_POST['password']) && preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?]).{8,}$/', $_POST['password'])) {

        $password = $_POST['password'];
    } else {
        $errors['password'] = "Password must be at least 8 characters, include one uppercase and one special character.";
    }

    if (empty($errors)) {

        $sql = "SELECT * FROM employees WHERE username = '$name' AND password = '$password' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $records = mysqli_fetch_assoc($result);

            //Get student data in indexed array
            // $student = mysqli_fetch_array($result,MYSQLI_NUM);

            $_SESSION['username'] = $records['username'];
            header('Location: welcome.php');
            exit();
        } else {
            $errors['result'] = "<p style = 'color: red' >Invalid Credentials!</p>";
        }
    } else {
        $errors['result'] = "<p style = 'color: red' >Error! Please correct the above mistakes</p>";
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
</head>

<body>
    <div class="main">
        <form id="form" method="POST">
            <label>Username:</label>
            <input type="text" name="name" value=""><br>
            <p class="red"><?= $errors['name'] ?? '' ?></p>

            <label>Password:</label>
            <input type="password" name="password" value=""><br>
            <p class="red"><?= $errors['password'] ?? '' ?></p>
            <button type="submit">Log In</button><br><br>
            <span>Not yet Registered?<a href="registration.php">Register Here</a></span>
            <p class="red"><?= $errors['result'] ?? '' ?></p>
        </form>
    </div>
</body>

</html>