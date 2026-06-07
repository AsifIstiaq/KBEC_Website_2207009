<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$id = $_POST['id'];
$role = $_POST['role'];
$name = $_POST['name'];
$description = $_POST['description'];

if(!empty($_FILES['photo']['name'])){

    $photo = $_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "uploads/faculty/".$photo
    );

    $stmt = $conn->prepare(
        "UPDATE faculty_advisors
        SET role=?,
            name=?,
            photo=?,
            description=?
        WHERE id=?"
    );

    $stmt->bind_param(
        "ssssi",
        $role,
        $name,
        $photo,
        $description,
        $id
    );

} else {

    $stmt = $conn->prepare(
        "UPDATE faculty_advisors
        SET role=?,
            name=?,
            description=?
        WHERE id=?"
    );

    $stmt->bind_param(
        "sssi",
        $role,
        $name,
        $description,
        $id
    );
}

$stmt->execute();

header("Location: manage_faculty.php");
exit();