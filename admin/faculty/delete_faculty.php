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

$result = $conn->query(
    "SELECT photo FROM faculty_advisors WHERE id=$id"
);

$row = $result->fetch_assoc();

if($row){
    @unlink(
        "../../uploads/faculty/".$row['photo']
    );
}

$stmt = $conn->prepare(
    "DELETE FROM faculty_advisors
     WHERE id=?"
);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();

header("Location: manage_faculty.php");
exit();