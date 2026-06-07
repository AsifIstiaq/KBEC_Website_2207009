<?php

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$result = $conn->query(
    "SELECT * FROM faculty_advisors ORDER BY id ASC"
);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Faculty Advisors</title>
  <link rel="stylesheet" href="faculty_advisors.css">
</head>

<body>

  <!-- Navigation -->

  <nav class="faculty-nav">
    <a href="#moderator">Moderator</a>
    <a href="#advisor">Advisor</a>
  </nav>

  <?php

  while($row = $result->fetch_assoc()) {

      $sectionId = strtolower($row['role']);

  ?>

  <section id="<?= $sectionId ?>" class="faculty-section">

    <div class="faculty-banner">

      <img src="uploads/faculty/<?= $row['photo']; ?>" alt="<?= htmlspecialchars($row['name']); ?>">

      <div class="faculty-overlay">

        <span class="faculty-role">
          <?= htmlspecialchars($row['role']); ?>
        </span>

        <h1>
          <?= htmlspecialchars($row['name']); ?>
        </h1>

      </div>

    </div>

    <div class="faculty-description">

      <h2 class="faculty-title">
        <?= htmlspecialchars($row['role']); ?> of KBEC
      </h2>

      <p>
        <?= nl2br(htmlspecialchars($row['description'])); ?>
      </p>

    </div>

  </section>

  <?php } ?>

</body>

</html>