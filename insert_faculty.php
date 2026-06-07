<?php

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$role = $_POST['role'];
$name = $_POST['name'];
$description = $_POST['description'];

$photo = $_FILES['photo']['name'];

move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    "uploads/faculty/" . $photo
);

$stmt = $conn->prepare(
    "INSERT INTO faculty_advisors
    (role,name,photo,description)
    VALUES (?,?,?,?)"
);

$stmt->bind_param(
    "ssss",
    $role,
    $name,
    $photo,
    $description
);

$stmt->execute();

header("Location: manage_faculty.php");