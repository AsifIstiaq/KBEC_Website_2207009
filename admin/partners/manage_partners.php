<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406","root","","kbec_db");

$result = $conn->query(
    "SELECT * FROM club_partners ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Club Partners Management</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="../admin_dashboard.php" class="logout-btn">
    Back
  </a>

  <div class="page-container">

    <div class="page-header">

      <h2>Club Partners Management</h2>

      <a href="add_partner.php" class="add-btn">
        Add Partner
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

          <td><?= $row['id']; ?></td>

          <td>
            <img src="../../uploads/club_partners/<?= $row['logo']; ?>" class="sponsor-logo">
          </td>

          <td><?= $row['title']; ?></td>

          <td>

            <div class="action-buttons">

              <a class="edit-btn" href="edit_partner.php?id=<?= $row['id']; ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_partner.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Delete partner?')">
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