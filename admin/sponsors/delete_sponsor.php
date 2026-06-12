<?php

session_start();

$conn = new mysqli("localhost:4406","root","","kbec_db");

$id = intval($_GET['id']);

$conn->query(
"DELETE FROM sponsors WHERE id=$id"
);

header("Location: manage_sponsors.php");