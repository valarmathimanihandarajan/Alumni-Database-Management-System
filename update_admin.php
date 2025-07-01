<?php
// Include the database connection file
include('db.php');

// Start the session
session_start();

if (!isset($_SESSION['alumni'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

$alumni_id = $_SESSION['alumni']['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $current_position = mysqli_real_escape_string($conn, $_POST['current_position']);

    // SQL query to update the alumni record
    $query = "UPDATE alm SET name = '$name', email = '$email', course = '$course', department = '$department', current_position = '$current_position' WHERE id = $alumni_id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        $success = "Alumni details updated successfully.";
    } else {
        $error = "Error updating details: " . mysqli_error($conn);
    }
}

// Fetch current details for pre-filling the form
$query = "SELECT * FROM alm WHERE id = $alumni_id";
$result = mysqli_query($conn, $query);
$alumni = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Alumni Details</title>
</head>
<body>
    <h2>Update Your Details</h2>

    <?php
    if (isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }

    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $alumni['name']; ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $alumni['email']; ?>" required><br><br>

        <label for="course">Course:</label><br>
        <input type="text" id="course" name="course" value="<?php echo $alumni['course']; ?>" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" value="<?php echo $alumni['department']; ?>" required><br><br>

        <label for="current_position">Current Position:</label><br>
        <input type="text" id="current_position" name="current_position" value="<?php echo $alumni['current_position']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
