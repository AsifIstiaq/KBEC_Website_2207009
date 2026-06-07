<?php

$host = "localhost:4406";
$username = "root";
$password = "";
$database = "kbec_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KBEC Events</title>
  <link rel="stylesheet" href="events.css">
  <link rel="stylesheet" href="footer.css" />
</head>

<body>

  <section class="events-header">
    <h1>All KBEC Events</h1>
    <p>Explore our workshops, seminars, competitions and entrepreneurship initiatives.</p>
  </section>

  <section class="events-container">

    <?php
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
?>

    <div class="event-card">

      <div class="event-image">
        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Image">
      </div>

      <div class="event-content">
        <h2><?php echo htmlspecialchars($row['title']); ?></h2>

        <p class="event-date">
          <?php echo date("F d, Y", strtotime($row['event_date'])); ?>
        </p>

        <p>
          <?php echo nl2br(htmlspecialchars($row['description'])); ?>
        </p>
      </div>

    </div>

    <?php
    }

} else {

    echo "<div class='no-events'>No events available yet.</div>";

}
?>

  </section>

  <?php include 'footer.php'; ?>

</body>

</html>

<?php
$conn->close();
?>