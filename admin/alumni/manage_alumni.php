<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$result = $conn->query(
    "SELECT * FROM alumni ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Alumni Management</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="../admin_dashboard.php" class="logout-btn">
    Back
  </a>

  <div class="page-container">

    <div class="page-header">

      <h2>Alumni Management</h2>

      <a href="add_alumni.php" class="add-btn">
        Add Alumni
      </a>

    </div>

    <div class="sponsor-card-container">

      <table>

        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Position</th>
          <th>Session</th>
          <th>Actions</th>
        </tr>

        <?php while($row=$result->fetch_assoc()) { ?>

        <tr>

          <td><?= $row['id'] ?></td>

          <td>
            <img src="../../uploads/alumni/<?= $row['photo'] ?>" class="sponsor-logo">
          </td>

          <td><?= $row['name'] ?></td>

          <td><?= $row['club_position'] ?></td>

          <td><?= htmlspecialchars($row['session']) ?></td>

          <td>

            <div class="action-buttons">

              <a class="edit-btn" href="edit_alumni.php?id=<?= $row['id'] ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_alumni.php?id=<?= $row['id'] ?>"
                onclick="return confirm('Delete alumni?')">
                Delete
              </a>

            </div>

          </td>

        </tr>

        <?php } ?>

      </table>

    </div>

  </div>

</body>

</html>