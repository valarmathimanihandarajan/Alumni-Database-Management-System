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

// SQL query to delete the alumni record
$query = "DELETE FROM alm WHERE id = $alumni_id";

// Execute the query
if (mysqli_query($conn, $query)) {
    session_destroy(); // Destroy session after deletion
    header('Location: login.php');  // Redirect to login page
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
