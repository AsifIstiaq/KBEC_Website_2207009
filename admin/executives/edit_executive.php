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
    "SELECT * FROM executive_panel WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$executive = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Executive</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <form class="sponsor-form" action="update_executive.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $executive['id']; ?>">

    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($executive['name']); ?>" required>

    <label>Current Photo</label>

    <img src="../../uploads/executives/<?= $executive['photo']; ?>" class="current-logo" alt="">

    <label>Upload New Photo (Optional)</label>

    <input type="file" name="photo" accept="image/*">

    <label>Facebook Profile</label>

    <input type="url" name="facebook_link" value="<?= htmlspecialchars($executive['facebook_link']); ?>">

    <label>LinkedIn Profile</label>

    <input type="url" name="linkedin_link" value="<?= htmlspecialchars($executive['linkedin_link']); ?>">

    <label>Club Position</label>

    <input type="text" name="club_position" value="<?= htmlspecialchars($executive['club_position']); ?>">

    <button type="submit">
      Update Executive
    </button>

  </form>

</body>

</html>