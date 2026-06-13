<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$event = $result->fetch_assoc();

if(!$event){
    die("Event not found");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Event</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="events_admin.php" class="logout-btn">
    Back
  </a>

  <div class="dashboard-container">

    <div class="edit-event">

      <h2>Edit Event</h2>

      <form action="update_event.php" method="POST">

        <input type="hidden" name="id" value="<?= $event['id']; ?>">

        <label>Event Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($event['title']); ?>" required>

        <label>Event Date</label>
        <input type="date" name="event_date" value="<?= $event['event_date']; ?>" required>

        <label>Description</label>
        <textarea name="description" rows="6" required><?= htmlspecialchars($event['description']); ?></textarea>

        <button type="submit" class="submit-btn">
          Update Event
        </button>

      </form>

    </div>

  </div>

</body>

</html>