<!DOCTYPE html>
<html>

<head>
  <title>Add Executive</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>

  <a href="manage_executives.php" class="logout-btn">
    Back
  </a>

  <form class="sponsor-form" action="insert_executive.php" method="POST" enctype="multipart/form-data">

    <h2 style="text-align:center; color:#1e3c72; margin-bottom:20px;">
      Add Executive
    </h2>

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Photo</label>
    <input type="file" name="photo" accept="image/*" required>

    <label>Facebook Profile</label>
    <input type="url" name="facebook_link">

    <label>LinkedIn Profile</label>
    <input type="url" name="linkedin_link">

    <label>Club Position</label>
    <input type="text" name="club_position">

    <button type="submit">
      Add Executive
    </button>

  </form>

</body>

</html>