<?php
session_start();
include 'db.php';

if (!isset($_SESSION['alumni_id'])) {
    header("Location: login.php");
    exit();
}

$alumni_id = $_SESSION['alumni_id'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO job (alumni_id, title, description) VALUES ('$alumni_id', '$title', '$description')";
    if (mysqli_query($conn, $query)) {
        $message = "<p class='success'>Job Posted Successfully!</p>";
    } else {
        $message = "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post a Job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffeef5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #c2185b;
            margin-bottom: 25px;
            font-size: 28px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #f8bbd0;
            border-radius: 8px;
            font-size: 16px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #ec407a;
            border: none;
            color: #fff;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d81b60;
        }

        .success {
            color: green;
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #6e6e6e;
            font-size: 14px;
        }

        @media (max-width: 500px) {
            .container {
                margin: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Post a Job</h2>
        <?php echo $message; ?>
        <form action="post_job.php" method="POST">
            <input type="text" name="title" placeholder="Job Title" required>
            <textarea name="description" placeholder="Job Description" rows="5" required></textarea>
            <button type="submit">Post Job</button>
        </form>
    </div>

    <footer>
        &copy; 2025 PSNA College of Engineering. All Rights Reserved.
    </footer>
</body>
</html>
