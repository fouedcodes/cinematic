<?php
require("./db_config.php");
$errorMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Insecure query (NOT RECOMMENDED FOR PRODUCTION)
  // Replace with prepared statements to prevent SQL injection
  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    session_start();
    $_SESSION['registered_user_email'] = $email;
    // Login successful (redirect to profile page)
    header("Location: profil.php"); // Replace with intended page
  } else {
    $errorMessage = "Invalid email or password!";
  }
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Login (Insecure)</title>
</head>
<body>

  <h1>Login (Insecure)</h1>
  <?php if ($errorMessage): ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
  <?php endif; ?>
  <form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <input type="submit" value="Login">
  </form>

</body>
</html>