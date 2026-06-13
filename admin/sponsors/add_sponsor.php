<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Sponsor</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="manage_sponsors.php" class="logout-btn">
    Back
  </a>

  <form action="insert_sponsor.php" method="POST" enctype="multipart/form-data" class="sponsor-form">

    <h2 style="text-align:center; color:#1e3c72; margin-bottom:20px;">
      Add New Sponsor
    </h2>

    <label>Title</label>
    <input type="text" name="title" required>

    <label>Logo</label>
    <input type="file" name="logo" accept="image/*" required>

    <button type="submit">
      Add Sponsor
    </button>

  </form>

</body>

</html>