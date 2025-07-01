<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alumni_id = $_SESSION['alumni_id']; // Assuming alumni ID is saved in session
    $event_id = $_POST['event_id'];

    $sql = "INSERT INTO reg (alumni_id, event_id) VALUES ('$alumni_id', '$event_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Registered for event successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM evt";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Event</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Register for Event</h2>
    <form method="POST" action="">
        <select name="event_id">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
