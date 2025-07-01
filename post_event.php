<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include('db.php');

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    $sql = "INSERT INTO evt (title, description, event_date) VALUES ('$title', '$description', '$event_date')";
    if ($conn->query($sql) === TRUE) {
        $message = "🎉 Event posted successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Event</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fce4ec;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #d81b60;
            margin-bottom: 20px;
            font-size: 28px;
        }

        input[type="text"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 15px;
            margin: 12px 0;
            border: 2px solid #f8bbd0;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #d81b60;
            color: white;
            padding: 14px 0;
            border: none;
            width: 100%;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #c2185b;
        }

        .message {
            text-align: center;
            font-size: 18px;
            color: green;
            margin-top: 15px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Post a New Event</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="title" placeholder="Event Title" required>
            <textarea name="description" placeholder="Event Description" rows="5" required></textarea>
            <input type="date" name="event_date" required>
            <input type="submit" value="Post Event">
        </form>
    </div>
</body>
</html>
