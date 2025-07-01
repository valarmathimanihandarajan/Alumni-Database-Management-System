<?php
include 'db.php';
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $year = $_POST['year'];
    $course = $_POST['course'];
    $dept = $_POST['department'];
    $position = $_POST['position'];

    $check = mysqli_query($conn, "SELECT * FROM alm WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Email already exists!";
    } else {
        $sql = "INSERT INTO alm (name, email, password, graduation_year, course, department, current_position, status)
                VALUES ('$name', '$email', '$password', '$year', '$course', '$dept', '$position', 'approved')";
        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful! You can now log in.";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Alumni</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            width: 85%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            box-sizing: border-box;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: scale(0.95);}
            to {opacity: 1; transform: scale(1);}
        }

        h2 {
            text-align: center;
            color: #d81b60;
            font-size: 32px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            flex: 0 0 48%;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #f8bbd0;
            border-radius: 6px;
            outline: none;
            transition: 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus {
            border-color: #d81b60;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #d81b60;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #c2185b;
        }

        p {
            width: 100%;
            text-align: center;
            font-size: 16px;
            color: #f44336;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 100%;
            }

            .container {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Alumni Registration</h2>
    <form method="POST">
        <?php if ($message != '') echo "<p>$message</p>"; ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="year">Graduation Year:</label>
            <input type="number" name="year" id="year" required>
        </div>

        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" name="course" id="course">
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" name="department" id="department">
        </div>

        <div class="form-group">
            <label for="position">Current Position:</label>
            <input type="text" name="position" id="position">
        </div>

        <div class="form-group" style="flex: 0 0 100%;">
            <input type="submit" value="Register">
        </div>
    </form>
</div>

</body>
</html>
