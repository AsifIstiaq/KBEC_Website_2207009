<!DOCTYPE html>
<html>

<head>
  <title>Add Club Partner</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <form class="sponsor-form" action="insert_partner.php" method="POST" enctype="multipart/form-data">

    <h2 style="text-align:center; color:#1e3c72; margin-bottom:20px;">
      Add New Partner
    </h2>

    <label>Partner Title</label>

    <input type="text" name="title" required>

    <label>Partner Logo</label>

    <input type="file" name="logo" accept="image/*" required>

    <button type="submit">
      Add Partner
    </button>

  </form>

</body>

</html>