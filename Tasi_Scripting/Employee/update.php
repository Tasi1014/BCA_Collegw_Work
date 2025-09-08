<?php
include 'connection.php';

$name = $email = $phone = $position = $gender = "";
$terms = $remember = false;

$errors = array();
if($_GET['sid']){
$id = $_GET['sid'];
}
        $sql = "SELECT * FROM employees WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            echo "No students records found";
        }else{
            $records = mysqli_fetch_assoc($result);
        }

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Validate Name
    if (isset($_POST['name'])&& !empty($_POST['name']) && trim($_POST['name'])) {
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

        if($update_result){
             $errors['result'] = "<p style='color:green'> Records Successfully inserted</p>";
             header('Location: view-records.php');
        }else{
            {
            $errors['result']= "<p style='color:red'>Error Updation unsuccessfull </p>";
        }
        }
    }else {
            $errors['result']= "<p style='color:red'>Error unsuccessfull </p>";
        }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body>
<form method="POST">
    <fieldset>
        <legend>Registration Form</legend>

        <label>Username:</label>
        <input type="text" name="name" value="<?= $records['username'] ?>"><br>
        <p class="red"><?= $errors['name'] ?? '' ?></p>

        <label>Password:</label>
            <input type="password" name="password" value = "<?= $records['password'] ?>"><br>
            <p class="red"><?= $errors['password'] ?? '' ?></p>

        <label>Email:</label>
        <input type="text" name="email" value="<?= $records['email'] ?>"><br>
        <p class="red"><?= $errors['email'] ?? '' ?></p>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?= $records['phone'] ?>"><br>
        <p class="red"><?= $errors['phone'] ?? '' ?></p>

        <label>Position:</label>
        <select name="position">
            <option value="">Select Position</option>
            <option value="Frontend Developer" <?php if($records['position'] == 'Frontend Developer'){ echo "selected"; } ?>>Frontend Developer</option>
            <option value="Backend Developer" <?php if($records['position'] == 'Backend Developer'){ echo "selected"; } ?>>Backend Developer</option>
            <option value="QA Engineer" <?php if($records['position'] == 'QA Engineer'){ echo "selected"; } ?>>QA Engineer</option>
            <option value="DevOps Engineer" <?php if($records['position'] == 'DevOps Engineer'){ echo "selected"; } ?>>DevOps Engineer</option>
        </select>
        <p class="red"><?= $errors['position'] ?? '' ?></p>

        <label>Gender:</label>
        <label><input type="radio" name="gender" value="Male" <?= $records['gender']=="Male"?"checked":"" ?>> Male</label>
        <label><input type="radio" name="gender" value="Female" <?= $records['gender']=="Female"?"checked":"" ?>> Female</label>
        <label><input type="radio" name="gender" value="Others" <?= $records['gender']=="Others"?"checked":"" ?>> Others</label>
        <p class="red"><?= $errors['gender'] ?? '' ?></p>

        <label><input type="checkbox" name="terms" <?= $records['terms_and_conditions']?"checked":"" ?>> I accept the terms & conditions</label>
        <p class="red"><?= $errors['terms'] ?? '' ?></p>

        <button type="submit">Update</button>
        <input type="reset">

        <p> <?= $errors['result'] ?? '' ?> </p>
    </fieldset>
</form>

</body>

</html>