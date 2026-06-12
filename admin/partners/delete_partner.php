<?php

session_start();

if(!isset($_SESSION['admin'])){
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

/* Get logo name */

$stmt = $conn->prepare(
    "SELECT logo
     FROM club_partners
     WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$partner = $result->fetch_assoc();

/* Delete image file */

if($partner){

    $file = "../../uploads/club_partners/" . $partner['logo'];

    if(file_exists($file)){
        unlink($file);
    }
}

/* Delete database record */

$stmt = $conn->prepare(
    "DELETE FROM club_partners
     WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manage_partners.php");
exit();