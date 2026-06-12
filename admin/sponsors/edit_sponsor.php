<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit();
}

$conn = new mysqli("localhost:4406", "root", "", "kbec_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("Sponsor ID not provided.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM sponsors WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$sponsor = $result->fetch_assoc();

if (!$sponsor) {
    die("Sponsor not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Sponsor</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <div class="edit-container">

    <h2>Edit Sponsor</h2>

    <form action="update_sponsor.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?= $sponsor['id']; ?>">

      <label>Sponsor Title</label>

      <input type="text" name="title" value="<?= htmlspecialchars($sponsor['title']); ?>" required>

      <label>Current Logo</label>

      <img src="../../uploads/sponsors/<?= htmlspecialchars($sponsor['logo']); ?>" class="current-logo"
        alt="Sponsor Logo" style="width:120px; margin:10px 0; display:block;">

      <label>Upload New Logo (Optional)</label>

      <input type="file" name="logo" accept="image/*">

      <button type="submit">
        Update Sponsor
      </button>

    </form>

  </div>

</body>

</html>