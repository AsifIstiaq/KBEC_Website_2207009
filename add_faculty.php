<!DOCTYPE html>
<html>

<head>
  <title>Add Faculty Advisor</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <form class="sponsor-form" action="insert_faculty.php" method="POST" enctype="multipart/form-data">

    <h2 style="text-align:center; color:#1e3c72; margin-bottom:20px;">
      Add Faculty Advisor
    </h2>

    <label>Role</label>
    <input type="text" name="role" required>

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Photo</label>
    <input type="file" name="photo" accept="image/*" required>

    <label>Description</label>
    <textarea name="description" rows="6" required></textarea>

    <button type="submit">
      Add Faculty Advisor
    </button>

  </form>

</body>

</html>