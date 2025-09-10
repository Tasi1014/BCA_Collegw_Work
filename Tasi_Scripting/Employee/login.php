<?php

$name = $password = "";

include 'connection.php';

session_start();
// Prefill if "Remember Me" session exists
if (isset($_SESSION['remember_name'])) {
    $name = $_SESSION['remember_name'];
}
if (isset($_SESSION['remember_password'])) {
    $password = $_SESSION['remember_password'];
}

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
            // Remember Me using session
            if (!empty($_POST['chk'])) {
                $_SESSION['remember_name'] = $name;
                $_SESSION['remember_password'] = $password;
            } else {
                unset($_SESSION['remember_name'], $_SESSION['remember_password']);
            }
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
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
            background-color: green;
        }

        .main {
            border: none;
            border-radius: 10px;
            background-color: #FEFEFE;
            padding: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        h2 {
            color: #7AA1D8;
            text-align: center;
        }

        .input-form {
            width: 100%;
            padding: 8px;
            border: 1px solid gray;
            outline: none;
            border-radius: 5px;
        }

        .input-form:focus {
            border: 1px solid blue;
            box-shadow: 0 0 5px rgba(24, 119, 242, 0.5);
        }

        input[type="checkbox"] {
            accent-color: green;
        }

        button {
            height: 35px;
            background-color: green;
            font-weight: 700;
            text-align: center;
            border-radius: 5px;
            color: white;
            width: 100%;
            font-size: 20px;

        }

        span {
            display: block;
            text-align: center;
        }

        a {
            display: flex;
            justify-content: center;
            align-items: center;
            color: green;
            padding: 10px;
            background: green;
            height: 35px;
            width: 100%;
            font-size: 20px;
            border-radius: 5px;
            font-weight: 700;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Login Form</h2>
        <form id="form" method="POST">
            <label>Username:</label>
            <input type="text" name="name" value="<?= $name ?>" class="input-form">
            <p class="red"><?= $errors['name'] ?? '' ?></p>

            <label>Password:</label>
            <input type="password" name="password" value="<?= $password ?>" class="input-form">
            <p class="red"><?= $errors['password'] ?? '' ?></p>
            <input type="checkbox" id="chk" name="chk" <?= isset($_SESSION['remember_name']) ? 'checked' : '' ?>>
            <label for="chk">Remember me?</label><br><br>
            <button type="submit">Log In</button>
            <p><?= $errors['result'] ?? ''?></p>
            <a href="registration.php">Register Here</a>
        </form>
    </div>
</body>

</html>