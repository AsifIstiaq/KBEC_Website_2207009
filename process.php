<?php
function getValue($key) {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : "Not provided";
}

$name = getValue("name");
$email = getValue("email");
$phone = getValue("phone");
$department = getValue("department");
$roll = getValue("roll");
$gender = getValue("gender");
$skill = getValue("skill");
$interest = getValue("interest");
$experience = getValue("experience");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Submitted</title>
  <link rel="stylesheet" href="form.css">
</head>

<body>

  <div class="container">
    <h1>🎉 Application Submitted</h1>
    <p>Thank you for applying to KBEC. Here is your information:</p>

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

    <a href="form.php" class="back-btn">← Submit Another Response</a>
  </div>

</body>

</html>