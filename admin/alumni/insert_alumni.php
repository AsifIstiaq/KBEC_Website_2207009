<?php

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$name = $_POST['name'];
$facebook = $_POST['facebook_link'];
$linkedin = $_POST['linkedin_link'];
$position = $_POST['club_position'];
$session = $_POST['session'];

$photo = $_FILES['photo']['name'];

move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    "../../uploads/alumni/".$photo
);

$stmt = $conn->prepare(
"INSERT INTO alumni
(name,photo,facebook_link,linkedin_link,club_position,session)
VALUES (?,?,?,?,?,?)"
);

$stmt->bind_param(
"ssssss",
$name,
$photo,
$facebook,
$linkedin,
$position,
$session
);

$stmt->execute();

header("Location: manage_alumni.php");