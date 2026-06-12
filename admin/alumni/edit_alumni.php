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

if (!isset($_GET['id'])) {
    die("Alumni ID not provided.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare(
    "SELECT * FROM alumni WHERE id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$alumni = $result->fetch_assoc();

if (!$alumni) {
    die("Alumni not found.");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Alumni</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <form class="sponsor-form" action="update_alumni.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $alumni['id']; ?>">

    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($alumni['name']); ?>" required>

    <label>Current Photo</label>

    <img src="../../uploads/alumni/<?= htmlspecialchars($alumni['photo']); ?>" class="current-logo" alt="Alumni Photo">

    <label>Upload New Photo (Optional)</label>
    <input type="file" name="photo" accept="image/*">

    <label>Facebook Profile</label>
    <input type="url" name="facebook_link" value="<?= htmlspecialchars($alumni['facebook_link']); ?>">

    <label>LinkedIn Profile</label>
    <input type="url" name="linkedin_link" value="<?= htmlspecialchars($alumni['linkedin_link']); ?>">

    <label>Club Position</label>
    <input type="text" name="club_position" value="<?= htmlspecialchars($alumni['club_position']); ?>">

    <label>Membership Session</label>
    <input type="text" name="session" value="<?= $alumni['session']; ?>" required>

    <button type="submit">
      Update Alumni
    </button>

  </form>

</body>

</html>