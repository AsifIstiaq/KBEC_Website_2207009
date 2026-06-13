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
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

  <div class="dashboard-container">

    <!-- Header -->
    <div class="dashboard-header">

      <div>
        <h1>KBEC Admin Dashboard</h1>
        <p>Welcome, <?= $_SESSION['admin']; ?></p>
      </div>

      <a href="auth/logout.php" class="logout-btn">Logout</a>

    </div>

    <div class="dashboard-section">
      <h2>Management Section</h2>
      <a href="events/events_admin.php" class="submit-btn">
        Events
      </a>
      <a href="sponsors/manage_sponsors.php" class="submit-btn">
        Sponsors
      </a>
      <a href="partners/manage_partners.php" class="submit-btn">
        Club Partners
      </a>
      <a href="alumni/manage_alumni.php" class="submit-btn">
        Alumni
      </a>
      <a href="executives/manage_executives.php" class="submit-btn">
        Executive Panel
      </a>
      <a href="faculty/manage_faculty.php" class="submit-btn">
        Faculty Advisors
      </a>
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
          <th>Interest</th>
          <th>Experience</th>
          <th>Actions</th>
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
          <td><?= $row['interest']; ?></td>
          <td><?= $row['experience']; ?></td>
          <td>
            <div class="action-buttons">
              <a class="edit-btn" href="members/edit_member.php?id=<?= $row['id']; ?>">
                Edit
              </a>
              <a class="delete-btn" href="members/delete_member.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Are you sure you want to delete this member?')">
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