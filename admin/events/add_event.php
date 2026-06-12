<?php

$host = "localhost:4406";
$username = "root";
$password = "";
$database = "kbec_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if(isset($_POST['title'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    $uploadDir = "../../uploads/events/";

    if(!file_exists($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    $imageName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $uploadDir . $imageName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO events
            (title, description, image, event_date)
            VALUES
            (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $title,
        $description,
        $targetFile,
        $event_date
    );

    if($stmt->execute()){
        header("Location: ../admin_dashboard.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>