<?php
session_start();
include 'db.php';

// Check if alumni is logged in
if (!isset($_SESSION['alumni_id'])) {
    header("Location: login.php");
    exit();
}

$alumni_id = $_SESSION['alumni_id'];
$message = '';

// Update details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $course = $_POST['course'];
    $department = $_POST['department'];

    $sql = "UPDATE alm SET 
                name = '$name', 
                current_position = '$position', 
                course = '$course', 
                department = '$department' 
            WHERE id = $alumni_id";

    if (mysqli_query($conn, $sql)) {
        $message = "Profile updated successfully!";
    } else {
        $message = "Error updating: " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM alm WHERE id = $alumni_id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Alumni Details</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffe0f0, #ffccf9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 0 20px rgba(255, 105, 180, 0.3);
            width: 400px;
            animation: pop 0.6s ease;
        }

        @keyframes pop {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 10px;
            border: 2px solid #ffb6c1;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            background: transparent;
            transition: border-color 0.3s;
        }

        .form-group label {
            position: absolute;
            top: 12px;
            left: 15px;
            color: #888;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -10px;
            left: 10px;
            background: white;
            padding: 0 5px;
            font-size: 12px;
            color: #e91e63;
        }

        input[type="submit"] {
            background: #e91e63;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 15px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #d81b60;
        }

        .message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Your Profile</h2>
    <?php if ($message != '') echo "<div class='message'>$message</div>"; ?>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" placeholder=" " required>
            <label>Your Name</label>
        </div>
        <div class="form-group">
            <input type="text" name="position" value="<?= htmlspecialchars($row['current_position']) ?>" placeholder=" ">
            <label>Current Position</label>
        </div>
        <div class="form-group">
            <input type="text" name="course" value="<?= htmlspecialchars($row['course']) ?>" placeholder=" ">
            <label>Course</label>
        </div>
        <div class="form-group">
            <input type="text" name="department" value="<?= htmlspecialchars($row['department']) ?>" placeholder=" ">
            <label>Department</label>
        </div>
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>
