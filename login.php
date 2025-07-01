<?php
session_start();
include 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); // Assuming MD5 hashed passwords

    $sql = "SELECT * FROM alm WHERE email='$email' AND password='$password' AND status='approved'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['alumni_id'] = $row['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid Email or Password or Account not approved.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alumni Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdeff4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 420px;
            margin: 80px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #c2185b;
            margin-bottom: 25px;
            font-size: 28px;
        }

        label {
            display: block;
            font-size: 18px;
            margin: 10px 0 5px;
            color: #880e4f;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 1px solid #f8bbd0;
            border-radius: 8px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #ec407a;
            color: #fff;
            font-size: 18px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #d81b60;
        }

        .msg {
            color: red;
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
        }

        @media (max-width: 480px) {
            .container {
                margin: 40px 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Alumni Login</h2>
    <?php if ($message != '') echo "<p class='msg'>$message</p>"; ?>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
