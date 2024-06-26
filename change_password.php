<?php
session_start();
$email= $_SESSION["registered_user_email"];
$login = $_SESSION['login'];
require("./db_config.php"); // Include the database connection file

if( $login== false){
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password=$_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if($new_password==$confirm_password){
      $query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
      $result = $conn->query($query); // Execute the query (vulnerable)
      if ($conn->affected_rows === 1) {
        echo "Password updated successfully!.. wait 2 Sec you will be redirected to login page";
        header("Refresh: 2; url=login.php");
      } else {
        echo "Error updating password. Please try again.";
      }
    }else {
      echo "Passwords do not match."; // Improved error message
      header("Refresh: 2; url=change_password.php");
    }
  }
}else {
  header('Location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Set New Password</title>
  <link rel="stylesheet" href="./css/change_password.css">
</head>
<body>

<h2>Set Your New Password</h2>

<form method="post" action="">

  <?php echo (isset($errorMessage) ? "<span class='error'>$errorMessage</span><br>" : ""); ?>

  <label for="new_password">New Password:</label>
  <input type="password" id="new_password" name="new_password" required>
  <br><br>

  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password" required>
  <br><br>

  <button type="submit">Set Password</button>
</form>

</body>
</html>