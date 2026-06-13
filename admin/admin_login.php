<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KBEC Admin Login</title>
  <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>

  <div class="container">

    <h1>Admin Login</h1>

    <form action="auth/login_process.php" method="POST">

      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <div class="checkbox-group">
        <label>
          <input type="checkbox" name="remember">
        </label>
        <div>Remember Me</div>
      </div>

      <button type="submit">Login</button>

    </form>
  </div>

</body>

</html>