<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli(
    "localhost:4406",
    "root",
    "",
    "kbec_db"
);

$id = $_GET['id'];

$stmt = $conn->prepare(
    "SELECT * FROM faculty_advisors WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$faculty = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Faculty Advisor</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <form class="sponsor-form" action="update_faculty.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $faculty['id']; ?>">

    <label>Role</label>

    <input type="text" name="role" value="<?= htmlspecialchars($faculty['role']); ?>" required>

    <label>Name</label>

    <input type="text" name="name" value="<?= htmlspecialchars($faculty['name']); ?>" required>

    <label>Current Photo</label>

    <img src="../../uploads/faculty/<?= $faculty['photo']; ?>" class="current-logo" alt="">

    <label>Upload New Photo</label>

    <input type="file" name="photo" accept="image/*">

    <label>Description</label>

    <textarea name="description" rows="6" required><?= htmlspecialchars($faculty['description']); ?></textarea>

    <button type="submit">
      Update Faculty Advisor
    </button>

  </form>

</body>

</html>