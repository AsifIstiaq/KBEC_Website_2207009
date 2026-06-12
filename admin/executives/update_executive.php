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

$id = $_POST['id'];

$name = $_POST['name'];
$facebook = $_POST['facebook_link'];
$linkedin = $_POST['linkedin_link'];
$position = $_POST['club_position'];

if (!empty($_FILES['photo']['name'])) {

    $photo = $_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "../../uploads/executives/" . $photo
    );

    $stmt = $conn->prepare(
        "UPDATE executive_panel
        SET name=?,
            photo=?,
            facebook_link=?,
            linkedin_link=?,
            club_position=?
        WHERE id=?"
    );

    $stmt->bind_param(
        "sssssi",
        $name,
        $photo,
        $facebook,
        $linkedin,
        $position,
        $id
    );

} else {

    $stmt = $conn->prepare(
        "UPDATE executive_panel
        SET name=?,
            facebook_link=?,
            linkedin_link=?,
            club_position=?
        WHERE id=?"
    );

    $stmt->bind_param(
        "ssssi",
        $name,
        $facebook,
        $linkedin,
        $position,
        $id
    );
}

$stmt->execute();

header("Location: manage_executives.php");
exit();