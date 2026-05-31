<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

$id = intval($_GET['id']);

$result = $conn->query(
    "SELECT * FROM members WHERE id=$id"
);

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Member</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <div class="edit-container">

    <h2>Edit Member Information</h2>

    <form action="update_member.php" method="POST">

      <input type="hidden" name="id" value="<?= $row['id']; ?>">

      <label>Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($row['name']); ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($row['email']); ?>" required>

      <label>Phone</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']); ?>">

      <label>Department</label>
      <input type="text" name="department" value="<?= htmlspecialchars($row['department']); ?>">

      <label>Roll</label>
      <input type="text" name="roll" value="<?= htmlspecialchars($row['roll']); ?>">

      <label>Gender</label>
      <input type="text" name="gender" value="<?= htmlspecialchars($row['gender']); ?>">

      <label>Skill</label>
      <input type="text" name="skill" value="<?= htmlspecialchars($row['skill']); ?>">

      <button type="submit">
        Update Member
      </button>

    </form>

  </div>

</body>

</html>