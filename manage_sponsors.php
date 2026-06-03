<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406","root","","kbec_db");

$result = $conn->query("SELECT * FROM sponsors ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sponsors Management</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <div class="page-container">

    <div class="page-header">
      <h2>Sponsors Management</h2>

      <a href="add_sponsor.php" class="add-btn">
        Add Sponsor
      </a>
    </div>

    <div class="sponsor-card-container">

      <table>

        <tr>
          <th>ID</th>
          <th>Logo</th>
          <th>Title</th>
          <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>

          <td><?= $row['id'] ?></td>

          <td>
            <img src="uploads/sponsors/<?= $row['logo'] ?>" class="sponsor-logo" alt="<?= $row['title'] ?>">
          </td>

          <td><?= $row['title'] ?></td>

          <td>

            <div class="action-buttons">

              <a class="edit-btn" href="edit_sponsor.php?id=<?= $row['id'] ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_sponsor.php?id=<?= $row['id'] ?>"
                onclick="return confirm('Delete sponsor?')">
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