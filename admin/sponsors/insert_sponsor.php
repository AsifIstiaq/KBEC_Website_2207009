<?php

session_start();

$conn = new mysqli("localhost:4406","root","","kbec_db");

$title = $_POST['title'];

$logo = $_FILES['logo']['name'];

move_uploaded_file(
    $_FILES['logo']['tmp_name'],
    "../../uploads/sponsors/".$logo
);

$stmt = $conn->prepare(
"INSERT INTO sponsors(title,logo)
 VALUES (?,?)"
);

$stmt->bind_param(
"ss",
$title,
$logo
);

$stmt->execute();

header("Location: manage_sponsors.php");