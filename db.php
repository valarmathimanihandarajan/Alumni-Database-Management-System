<?php
$host = "localhost";
$user = "root";
$pass = ""; // default password is empty in XAMPP
$db = "alumnidb"; // name of your database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
