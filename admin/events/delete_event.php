<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = intval($_GET['id']);

$sql = "DELETE FROM events WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: events_admin.php");
exit();
?>