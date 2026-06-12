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

$id = intval($_POST['id']);

$name = $_POST['name'];
$facebook = $_POST['facebook_link'];
$linkedin = $_POST['linkedin_link'];
$position = $_POST['club_position'];
$session = $_POST['session'];

if (!empty($_FILES['photo']['name'])) {

    $photo = $_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "../../uploads/alumni/" . $photo
    );

    $stmt = $conn->prepare(
        "UPDATE alumni
         SET name=?,
             photo=?,
             facebook_link=?,
             linkedin_link=?,
             club_position=?,
             session=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "ssssssi",
        $name,
        $photo,
        $facebook,
        $linkedin,
        $position,
        $session,
        $id
    );

} else {

    $stmt = $conn->prepare(
        "UPDATE alumni
         SET name=?,
             facebook_link=?,
             linkedin_link=?,
             club_position=?,
             session=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "sssssi",
        $name,
        $facebook,
        $linkedin,
        $position,
        $session,
        $id
    );
}

$stmt->execute();

header("Location: manage_alumni.php");
exit();