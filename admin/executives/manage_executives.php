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
    "SELECT * FROM executive_panel ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Executive Management</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="../admin_dashboard.php" class="logout-btn">
    Back
  </a>

  <div class="page-container">

    <div class="page-header">

      <h2>Executive Panel Management</h2>

      <a href="add_executive.php" class="add-btn">
        Add Executive
      </a>

    </div>

    <div class="sponsor-card-container">

      <table>

        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>

          <td><?= $row['id']; ?></td>

          <td>
            <img src="../../uploads/executives/<?= $row['photo']; ?>" class="sponsor-logo">
          </td>

          <td><?= $row['name']; ?></td>

          <td><?= $row['club_position']; ?></td>

          <td>

            <div class="action-buttons">

              <a class="edit-btn" href="edit_executive.php?id=<?= $row['id']; ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_executive.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Delete executive?')">
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