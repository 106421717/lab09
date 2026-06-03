<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "lab09_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_POST['email'];

$sql = "UPDATE user
        SET email='$email'
        WHERE username='$username'";

mysqli_query($conn, $sql);

session_unset();
session_destroy();

header("Location: login.php");


exit();
?>