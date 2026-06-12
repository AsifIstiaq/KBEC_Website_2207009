<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = intval($_POST['id']);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$roll = $_POST['roll'];
$gender = $_POST['gender'];
$skill = $_POST['skill'];

$sql = "
UPDATE members
SET
name='$name',
email='$email',
phone='$phone',
department='$department',
roll='$roll',
gender='$gender',
skill='$skill'
WHERE id=$id
";

if($conn->query($sql)){
    header("Location: ../admin_dashboard.php");
}
else{
    echo "Update failed";
}

$conn->close();
?>