<?php
session_start();
include 'db.php';

if (!isset($_SESSION['alumni_id'])) {
    header("Location: login.php");
    exit();
}

$alumni_id = $_SESSION['alumni_id'];
$events = mysqli_query($conn, "SELECT * FROM evt");
$staffs = mysqli_query($conn, "SELECT * FROM stf");
$alumnis = mysqli_query($conn, "SELECT * FROM alm WHERE id != $alumni_id");
$jobs = mysqli_query($conn, "SELECT * FROM job ORDER BY posted_on DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Alumni Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(to right, #ffe0f0, #ffcce0);
      padding: 30px;
      animation: fadeIn 1.2s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .container {
      background-color: white;
      max-width: 1000px;
      margin: auto;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease-in-out;
    }

    h2 {
      text-align: center;
      color: #d63384;
      margin-bottom: 25px;
    }

    h3 {
      color: #b30059;
      margin-top: 30px;
      border-bottom: 2px dashed #ff99cc;
      padding-bottom: 5px;
    }

    p, li, a {
      font-size: 1rem;
      color: #333;
    }

    ul {
      list-style-type: none;
      padding-left: 0;
    }

    li {
      padding: 6px 0;
      border-bottom: 1px solid #f2f2f2;
    }

    a {
      text-decoration: none;
      margin: 0 8px;
      color: #d63384;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    a:hover {
      color: #ff0066;
      text-decoration: underline;
    }

    .action-links {
      text-align: center;
      margin-bottom: 20px;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      color: #666;
      font-size: 0.9rem;
    }

    .section {
      background-color: #fff0f5;
      padding: 15px 20px;
      border-radius: 15px;
      margin-top: 20px;
      box-shadow: 0 2px 6px rgba(255, 182, 193, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome to Your Alumni Dashboard!</h2>

    <div class="action-links">
      <a href="post_job.php">Post a Job</a> | 
      <a href="update_alumni.php">Update Profile</a> | 
      <a href="delete_alumni.php" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</a> | 
      <a href="logout.php">Logout</a>
    </div>

    <div class="section">
      <h3>Upcoming Events</h3>
      <ul>
        <?php while ($e = mysqli_fetch_assoc($events)) {
            echo "<li><strong>{$e['title']}</strong> on {$e['event_date']}</li>";
        } ?>
      </ul>
    </div>

    <div class="section">
      <h3>Other Alumni</h3>
      <ul>
        <?php while ($a = mysqli_fetch_assoc($alumnis)) {
            echo "<li>{$a['name']} ({$a['department']}) - {$a['current_position']}</li>";
        } ?>
      </ul>
    </div>

    <div class="section">
      <h3>Our Esteemed Staff</h3>
      <ul>
        <?php while ($s = mysqli_fetch_assoc($staffs)) {
            echo "<li>{$s['name']} ({$s['department']})</li>";
        } ?>
      </ul>
    </div>

    <div class="section">
      <h3>Job Openings</h3>
      <ul>
        <?php while ($j = mysqli_fetch_assoc($jobs)) {
            echo "<li><strong>{$j['title']}</strong>: {$j['description']}</li>";
        } ?>
      </ul>
    </div>

    <footer>
      <p>&copy; 2025 PSNA College of Engineering. All Rights Reserved.</p>
    </footer>
  </div>
</body>
</html>
