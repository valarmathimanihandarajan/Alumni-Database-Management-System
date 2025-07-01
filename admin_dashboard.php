<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec; /* Baby pink background */
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #d81b60; /* Dark pink background */
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid #f8bbd0; /* Light pink border */
        }

        h1 {
            font-size: 36px;
            margin: 0;
        }

        nav {
            margin-top: 15px;
            font-size: 18px;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #c2185b; /* Slightly darker pink on hover */
        }

        footer {
            background-color: #d81b60;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
            font-size: 18px;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            font-size: 28px;
            color: #d81b60;
            text-align: center;
        }

        .container a {
            font-size: 18px;
            color: #d81b60;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            display: block;
            margin: 20px 0;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .container a:hover {
            background-color: #f8bbd0; /* Light pink on hover */
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome, Admin</h1>
        <nav>
            <a href="add_staff.php">Add Staff</a> |
            <a href="view_staff.php">View Staff</a> |
            <a href="post_event.php">Post Event</a> |
            <a href="view_events.php">View Events</a> |
            <a href="del_alum.php">Delete Alumni</a> |
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h2>Admin Dashboard</h2>
        <p>Here you can manage staff, events, and other important information.</p>
        
        <a href="add_staff.php">Add New Staff</a>
        <a href="view_staff.php">View Staff List</a>
        <a href="post_event.php">Post a New Event</a>
        <a href="view_events.php">View All Events</a>
    </div>

    <footer>
        <p>&copy; 2025 PSNA College of Engineering & Technology</p>
    </footer>

</body>
</html>
