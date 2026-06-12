<?php
session_start();

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins 
        WHERE username='$username' 
        AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Session
    $_SESSION['admin'] = $username;

    // Cookie
    if(isset($_POST['remember'])) {
        setcookie("admin_user", $username, time() + (86400 * 7), "/");
    }

    header("Location: ../admin_dashboard.php");

} else {
    echo "Invalid username or password";
}

$conn->close();
?>