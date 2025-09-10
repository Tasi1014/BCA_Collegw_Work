<?php
include 'connection.php';

$name = $email = $phone = $position = $gender = "";
$terms = $remember = false;

$errors = array();
if ($_GET['sid']) {
    $id = $_GET['sid'];
}
$sql = "SELECT * FROM employees WHERE id ='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "No students records found";
} else {
    $records = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Validate Name
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = trim($_POST['name']);
    } else {
        $errors['name'] = "Name must be 3-15 alphabetic characters.";
    }

    // Validate Email
    if (!empty($_POST['email']) && preg_match('/^[a-z0-9_\-\.]+[@][a-z]+[\.][a-z]{2,3}[\.]?[a-z]{0,3}$/', $_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors['email'] = "Enter a valid email address.";
    }

    // Validate Phone (10 digits)
    if (!empty($_POST['phone']) && preg_match('/^\d{10}$/', $_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $errors['phone'] = "Phone must be exactly 10 digits.";
    }

    // Validate Position
    if (!empty($_POST['position'])) {
        $position = $_POST['position'];
    } else {
        $errors['position'] = "Please select a position.";
    }

    // Validate Gender
    if (!empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $errors['gender'] = "Please select your gender.";
    }

    // Validate Terms
    if (!empty($_POST['terms'])) {
        $terms = true;
    } else {
        $errors['terms'] = "You must accept terms & conditions.";
    }

    if (!empty($_POST['password']) && preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?]).{8,}$/', $_POST['password'])) {
        // Hash password using MD5
        $password = $_POST['password'];
    } else {
        $errors['password'] = "Password must be at least 8 characters, include one uppercase and one special character.";
    }

    if (empty($errors)) {

        $update_sql = " UPDATE employees SET username = '$name' , email = '$email', phone = '$phone', position = '$position', gender = '$gender', terms_and_conditions = '$terms' WHERE id = '$id'  ";

        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            $errors['result'] = "<p style='color:green'> Records Successfully inserted</p>";
            header('Location: view-records.php');
        } else { {
                $errors['result'] = "<p style='color:red'>Error Updation unsuccessfull </p>";
            }
        }
    } else {
        $errors['result'] = "<p style='color:red'>Error unsuccessfull </p>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: green;
        }

        .main {
            width: auto;
            background-color: #FEFEFE;
            padding: 20px;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }

        .form-heading {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        label{
            color: green;
            font-weight: 500;
        }
        .group1,
        .group2,
        .group3 {
            display: flex;
            gap: 10px;
        }

        .formgrp {
            flex: 1;
        }

        .input,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid gray;
            outline: none;
            transition: 0.2s;
        }

        .input:focus,
        select:focus {
            border: 1px solid blue;
            box-shadow: 0 0 5px rgba(24, 119, 242, 0.5);
        }

        button,
        #reset {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button {
            background-color:green;
            color: white;
        }

        #reset {
            background-color: #6c757d;
            color: white;
        }

        #reset:hover {
            background-color: #5a6268;
        }

        .gender-options {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .red {
            color: red;
        }

        input[typye = "checkbox", "radio" ]{
            accent-color : green;
        }
    </style>
</head>

<body>
    <div class="main">
        <h2 class="form-heading">Update Form</h2>
        <form method="POST">
            <div class="group1">
                <div class="formgrp">
                    <label>Username:</label>
                    <input type="text" name="name" class="input" value="<?= $records['username'] ?>">
                    <p class="red"><?= $errors['name'] ?? '' ?></p>
                </div>
                <div class="formgrp">
                    <label>Password:</label>
                    <input type="password" name="password" class="input" value="<?= $records['password'] ?>">
                    <p class="red"><?= $errors['password'] ?? '' ?></p>
                </div>
            </div>

            <div class="group2">
                <div class="formgrp">
                    <label>Email:</label>
                    <input type="text" name="email" class="input" value="<?= $records['email'] ?>">
                    <p class="red"><?= $errors['email'] ?? '' ?></p>
                </div>
                <div class="formgrp">
                    <label>Phone:</label>
                    <input type="text" name="phone" class="input" value="<?= $records['phone'] ?>">
                    <p class="red"><?= $errors['phone'] ?? '' ?></p>
                </div>
            </div>

            <div class="group3">
                <div class="formgrp">
                    <label>Position:</label>
                    <select name="position">
                        <option value="">Select Position</option>
                        <option value="Frontend Developer" <?= $records['position'] == "Frontend Developer" ? "selected" : "" ?>>Frontend Developer</option>
                        <option value="Backend Developer" <?= $records['position'] == "Backend Developer" ? "selected" : "" ?>>
                            Backend Developer</option>
                        <option value="QA Engineer" <?= $records['position'] == "QA Engineer" ? "selected" : "" ?>>QA Engineer
                        </option>
                        <option value="DevOps Engineer" <?= $records['position'] == "DevOps Engineer" ? "selected" : "" ?>>
                            DevOps Engineer</option>
                    </select>
                    <p class="red"><?= $errors['position'] ?? '' ?></p>
                </div>
                <div class="formgrp">
                    <label>Gender:</label>
                    <div class="gender-options">
                        <label><input type="radio" name="gender" value="Male" <?= $records['gender'] == "Male" ? "checked" : "" ?>> Male</label>
                        <label><input type="radio" name="gender" value="Female"
                                <?= $records['gender'] == "Female" ? "checked" : "" ?>> Female</label>
                        <label><input type="radio" name="gender" value="Others"
                                <?= $records['gender'] == "Others" ? "checked" : "" ?>> Others</label>
                    </div>
                    <p class="red"><?= $errors['gender'] ?? '' ?></p>
                </div>
            </div>

            <label><input type="checkbox" name="terms" <?= $records['terms_and_conditions'] ? "checked" : "" ?>> I accept the
                terms & conditions</label>
            <p class="red"><?= $errors['terms'] ?? '' ?></p>

            <button type="submit">Update</button>


            <p><?= $errors['result'] ?? '' ?></p>
        </form>
    </div>
</body>

</html>