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

$sql = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<head>
    <title>Profile</title>
</head>
<body>

<h2>Profile Page</h2>

<p>
    <strong>Username:</strong>
    <?php echo $user['username']; ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo $user['email']; ?>
</p>

<h3>Edit Profile</h3>

<form action="update_profile.php" method="post">

    Email:
    <input
        type="email"
        name="email"
        value="<?php echo $user['email']; ?>"
        required>

    <input type="submit" value="Update Email">

</form>
</body>
</html>