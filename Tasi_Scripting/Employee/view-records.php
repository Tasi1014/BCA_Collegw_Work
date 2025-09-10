<?php
include 'connection.php';

$sql = "SELECT * FROM employees";
$result =  mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        padding: 20px;
    }
    caption{
            text-align: center;
            margin-bottom: 20px;
            font-size: 3rem;
            color: #007bff;
        }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 1000px;
        background-color: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
        transition: 0.2s;
    }

    a {
        color: white;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
    }

    a[href*="delete"] {
        background-color: #dc3545;
    }

    a[href*="update"] {
        background-color: #28a745;
    }

    a:hover {
        opacity: 0.8;
    }

    p {
        text-align: center;
        font-size: 18px;
        color: #555;
    }
</style>

</head>
<body>
    <?php if(mysqli_num_rows($result)>0): ?>

    <table border="1" style="border-collapse: collapse">
        <caption>Employee Records</caption>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Terms and condition</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['position'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['terms_and_conditions']? "Accepted" : "Not accepted"; ?></td>
                <td><?= $row['password'] ?></td>
                <td><a href="delete.php?sid=<?php echo $row['id']; ?>">Delete</td>
                <td><a href="update.php?sid=<?php echo $row['id'];?>" >Update</a></td>
            </tr>
        <?php endWhile; ?>

    </table>

    <?php else: ?>
        <p>No records Found</p>
    <?php endif; ?>
</body>
</html>