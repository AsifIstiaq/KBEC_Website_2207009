<?php

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$result = $conn->query(
    "SELECT * FROM executive_panel ORDER BY id ASC"
);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Executive Panel</title>
  <link rel="stylesheet" href="../assets/css/alumni.css">
  <link rel="stylesheet" href="../assets/css/footer.css" />
</head>

<body>

  <section class="alumni-section">

    <h1>KBEC Executive Panel</h1>

    <div class="alumni-grid">

      <?php while($row = $result->fetch_assoc()) { ?>

      <div class="alumni-card">

        <div class="alumni-image">

          <img src="../uploads/executives/<?= $row['photo']; ?>" alt="<?= htmlspecialchars($row['name']); ?>">

        </div>

        <div class="alumni-info">

          <h3>
            <?= htmlspecialchars($row['name']); ?>
          </h3>

          <span class="position-badge">
            <?= htmlspecialchars($row['club_position']); ?>
          </span>

          <div class="social-links">

            <a href="<?= $row['facebook_link']; ?>" target="_blank">
              Facebook
            </a>

            <a href="<?= $row['linkedin_link']; ?>" target="_blank">
              LinkedIn
            </a>

          </div>

        </div>

      </div>

      <?php } ?>

    </div>

  </section>

  <?php include '../uploads/includes/footer.php'; ?>

</body>

</html>