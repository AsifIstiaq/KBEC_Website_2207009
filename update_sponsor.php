<?php

$conn = new mysqli("localhost:4406","root","","kbec_db");

$id = $_POST['id'];
$title = $_POST['title'];

if(!empty($_FILES['logo']['name'])){

    $logo = $_FILES['logo']['name'];

    move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        "uploads/sponsors/".$logo
    );

    $conn->query(
    "UPDATE sponsors
     SET title='$title',
         logo='$logo'
     WHERE id=$id"
    );

}else{

    $conn->query(
    "UPDATE sponsors
     SET title='$title'
     WHERE id=$id"
    );

}

header("Location: manage_sponsors.php");