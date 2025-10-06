<?php

session_start();

if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $valid_user = "cakelovers";
  $valid_pass = "12345";

  if ($username === $valid_user && $password === $valid_pass) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>

<html lang="id">

<head>

  <meta charset="UTF-8">
  <title> Login - Baking at Home </title>
  <link rel="stylesheet" href="style.css">

</head>

  <body>

    <div class="login-container">
      <h1> Login ke Baking at Home 🍰 </h1>
      
      <?php if (isset($error)): ?>
        <p class="error-msg"><?php echo $error; ?></p>
      <?php endif; ?>

      <form method="POST" action="login.php">
        <label> Username: </label>
        <input type="text" name="username" required>

        <label> Password: </label>
        <input type="password" name="password" required>

        <button type="submit"> Login </button>
      </form>

      <p class="link"> Use <b> cakelovers </b> and <b> 12345 </b> to login. </p>
    </div>

  </body>

</html>
