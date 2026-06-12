<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$event_date = $_POST['event_date'];

$sql = "
UPDATE events
SET
title = ?,
description = ?,
event_date = ?
WHERE id = ?
";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssi",
    $title,
    $description,
    $event_date,
    $id
);

$stmt->execute();

header("Location: events_admin.php");
exit();
?>