<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$id = $_GET['id'];

$stmt = $conn->prepare(
    "DELETE FROM executive_panel
    WHERE id=?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: manage_executives.php");
exit();