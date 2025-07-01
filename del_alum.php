<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

// Delete alumni
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM alm WHERE id = '$delete_id'";
    mysqli_query($conn, $delete_query);
    $message = "Alumni deleted successfully.";
}

// Fetch all approved alumni
$query = "SELECT id, name FROM alm WHERE status = 'approved'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Alumni</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial;
            background-color: #fff0f5;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #c2185b;
            margin-bottom: 20px;
        }

        select, button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #e91e63;
            color: white;
            border: none;
        }

        button:hover {
            background-color: #ad1457;
        }

        .message {
            text-align: center;
            color: green;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Delete Alumni</h2>

    <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>

    <form method="POST" action="">
        <label>Select Alumni Name:</label>
        <select name="delete_id" required>
            <option value="">-- Select Alumni --</option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php } ?>
        </select>

        <button type="submit">Delete</button>
    </form>
</div>
</body>
</html>
