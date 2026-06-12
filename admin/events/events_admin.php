<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$result = $conn->query("
    SELECT id, title
    FROM events
    ORDER BY event_date DESC
");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Manage Events</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <div class="dashboard-container">

    <div class="dashboard-header">
      <h1>Manage Events</h1>

      <a href="../admin_dashboard.php" class="logout-btn">
        Back
      </a>
    </div>

    <div class="table-card">

      <h2 class="table-title">All Events</h2>

      <table>

        <tr>
          <th>ID</th>
          <th>Event Title</th>
          <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>

          <td><?= $row['id']; ?></td>

          <td>
            <?= htmlspecialchars($row['title']); ?>
          </td>

          <td>
            <div class="action-buttons">

              <a class="edit-btn" href="edit_event.php?id=<?= $row['id']; ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_event.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Delete this event?')">
                Delete
              </a>

            </div>
          </td>

        </tr>

        <?php } ?>

      </table>

    </div>

    <div class="dashboard-section">

      <h2>Add New Event</h2>

      <?php
if(isset($_GET['success'])){
    echo "<div class='success-message'>
            Event added successfully!
          </div>";
}
?>

      <form action="add_event.php" method="POST" enctype="multipart/form-data" class="event-form">

        <label>Event Title</label>
        <input type="text" name="title" required>

        <label>Event Date</label>
        <input type="date" name="event_date" required>

        <label>Event Image</label>
        <input type="file" name="image" accept="image/*" required>

        <label>Event Description</label>
        <textarea name="description" rows="6" required></textarea>

        <button type="submit" class="submit-btn">
          Add Event
        </button>

      </form>

    </div>

  </div>

</body>

</html>