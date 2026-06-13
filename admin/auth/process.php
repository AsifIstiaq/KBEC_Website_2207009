<?php

// Database connection
$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to safely get form values
function getValue($key) {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : "Not provided";
}

// Get form data
$name = getValue("name");
$email = getValue("email");
$phone = getValue("phone");
$department = getValue("department");
$roll = getValue("roll");
$gender = getValue("gender");
$skill = getValue("skill");
$interest = getValue("interest");
$experience = getValue("experience");

// SQL query to insert data into database
$sql = "INSERT INTO members
(name, email, phone, department, roll, gender, skill, interest, experience)
VALUES
('$name', '$email', '$phone', '$department', '$roll', '$gender', '$skill', '$interest', '$experience')";

// Execute query
if ($conn->query($sql) !== TRUE) {
    die("Error: " . $conn->error);
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Submitted</title>
  <link rel="stylesheet" href="../../assets/css/form.css">
</head>

<body>

  <div class="container">

    <h1>🎉 Application Submitted</h1>
    <p>Thank you for applying to KBEC. Your information has been stored successfully.</p>

    <div class="summary">

      <div class="row"><span>Name:</span> <?= $name ?></div>
      <div class="row"><span>Email:</span> <?= $email ?></div>
      <div class="row"><span>Phone:</span> <?= $phone ?></div>
      <div class="row"><span>Department:</span> <?= $department ?></div>
      <div class="row"><span>Roll:</span> <?= $roll ?></div>
      <div class="row"><span>Gender:</span> <?= $gender ?></div>
      <div class="row"><span>Skill:</span> <?= $skill ?></div>
      <div class="row"><span>Interest:</span> <?= $interest ?></div>
      <div class="row"><span>Experience Level:</span> <?= $experience ?></div>

    </div>

    <a href="../../pages/form.php" class="submit_back-btn">← Submit Another Response</a>
    <a href="../../pages/index.php" class="back-btn">
      Home
    </a>
  </div>

</body>

</html>