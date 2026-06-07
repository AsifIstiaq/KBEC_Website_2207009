<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$result = $conn->query(
    "SELECT * FROM faculty_advisors ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Faculty Advisors Management</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <div class="page-container">

    <div class="page-header">

      <h2>Faculty Advisors Management</h2>

      <a href="add_faculty.php" class="add-btn">
        Add Faculty
      </a>

    </div>

    <div class="sponsor-card-container">

      <table>

        <tr>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Role</th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </tr>

        <?php while($row=$result->fetch_assoc()) { ?>

        <tr>

          <td><?= $row['id']; ?></td>

          <td>
            <img src="uploads/faculty/<?= $row['photo']; ?>" class="sponsor-logo" alt="">
          </td>

          <td><?= $row['role']; ?></td>

          <td><?= $row['name']; ?></td>

          <td>
            <?= substr($row['description'],0,80); ?>...
          </td>

          <td>

            <div class="action-buttons">

              <a class="edit-btn" href="edit_faculty.php?id=<?= $row['id']; ?>">
                Edit
              </a>

              <a class="delete-btn" href="delete_faculty.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Delete advisor?')">
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