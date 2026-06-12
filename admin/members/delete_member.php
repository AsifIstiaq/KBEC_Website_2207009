<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = intval($_GET['id']);

$sql = "DELETE FROM members WHERE id = $id";

if($conn->query($sql)){
    header("Location: ../admin_dashboard.php");
}
else{
    echo "Error deleting member.";
}

$conn->close();
?>