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

$photo = $_FILES['photo']['name'];

move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    "../../uploads/executives/".$photo
);

$stmt = $conn->prepare(
"INSERT INTO executive_panel
(name,photo,facebook_link,linkedin_link,club_position)
VALUES (?,?,?,?,?)"
);

$stmt->bind_param(
"sssss",
$name,
$photo,
$facebook,
$linkedin,
$position
);

$stmt->execute();

header("Location: manage_executives.php");