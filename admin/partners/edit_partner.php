<?php

session_start();

if(!isset($_SESSION['admin'])){
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
    "SELECT * FROM club_partners WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$partner = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Club Partner</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="manage_partners.php" class="logout-btn">
    Back
  </a>

  <form class="sponsor-form" action="update_partner.php" method="POST" enctype="multipart/form-data">

    <h2 style="text-align:center; color:#1e3c72; margin-bottom:20px;">
      Edit Club Partner
    </h2>

    <input type="hidden" name="id" value="<?= $partner['id']; ?>">

    <label>Partner Title</label>

    <input type="text" name="title" value="<?= htmlspecialchars($partner['title']); ?>" required>

    <label>Current Logo</label>

    <img src="../../uploads/club_partners/<?= $partner['logo']; ?>" class="current-logo" alt="">

    <label>Upload New Logo (Optional)</label>

    <input type="file" name="logo" accept="image/*">

    <button type="submit">
      Update Partner
    </button>

  </form>

</body>

</html>