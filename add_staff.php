<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "INSERT INTO stf (name, department, email) VALUES ('$name', '$department', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='message success'>New staff added successfully!</div>";
    } else {
        echo "<div class='message error'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Staff</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #ffe6f0, #ffccde);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background-color: white;
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(255, 182, 193, 0.3);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease-in-out;
    }

    h2 {
      text-align: center;
      color: #d63384;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 2px solid #ffb6c1;
      border-radius: 10px;
      font-size: 1rem;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #ff66a3;
      color: white;
      padding: 12px;
      font-size: 1rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #e60073;
    }

    .message {
      margin: 10px auto;
      text-align: center;
      padding: 10px;
      width: 90%;
      border-radius: 8px;
      font-weight: bold;
    }

    .success {
      background-color: #d1ffd6;
      color: #1e7c3e;
    }

    .error {
      background-color: #ffd6d6;
      color: #c70039;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <form method="POST" action="">
    <h2>Add New Staff</h2>
    <input type="text" name="name" placeholder="Staff Name" required>
    <input type="text" name="department" placeholder="Department" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="submit" value="Add Staff">
  </form>
</body>
</html>
