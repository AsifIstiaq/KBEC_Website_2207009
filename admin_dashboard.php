<?php
session_start();

if(!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");
$result = $conn->query("SELECT * FROM members");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KBEC Admin Dashboard</title>

  <!-- External CSS -->
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <div class="dashboard-container">

    <!-- Header -->
    <div class="dashboard-header">

      <div>
        <h1>KBEC Admin Dashboard</h1>
        <p>Welcome, <?= $_SESSION['admin']; ?></p>
      </div>

      <a href="logout.php" class="logout-btn">Logout</a>

    </div>

    <!-- Table Section -->
    <div class="table-card">

      <h2 class="table-title">Registered Members</h2>

      <table>

        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Department</th>
          <th>Roll</th>
          <th>Gender</th>
          <th>Skill</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['name']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['phone']; ?></td>
          <td><?= $row['department']; ?></td>
          <td><?= $row['roll']; ?></td>
          <td><?= $row['gender']; ?></td>
          <td><?= $row['skill']; ?></td>
        </tr>

        <?php } ?>

      </table>

    </div>

  </div>

</body>

</html>