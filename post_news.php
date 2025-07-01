<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO nws (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "News posted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Post News</h2>
        <input type="text" name="title" placeholder="News Title" required><br>
        <textarea name="content" placeholder="News Content" required></textarea><br>
        <input type="submit" value="Post News">
    </form>
</body>
</html>
