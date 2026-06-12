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

$id = $_POST['id'];
$title = $_POST['title'];

if(!empty($_FILES['logo']['name'])){

    $logo = $_FILES['logo']['name'];

    move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        "../../uploads/club_partners/" . $logo
    );

    $stmt = $conn->prepare(
        "UPDATE club_partners
         SET title=?, logo=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "ssi",
        $title,
        $logo,
        $id
    );

} else {

    $stmt = $conn->prepare(
        "UPDATE club_partners
         SET title=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "si",
        $title,
        $id
    );
}

$stmt->execute();

header("Location: manage_partners.php");
exit();