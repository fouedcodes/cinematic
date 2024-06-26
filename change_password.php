<?php
session_start();
$login = $_SESSION['login'];
$valid = $_SESSION['change_password'];
if($valid == true && $login== false){
    echo ('test');
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

<form method="post" action="process.php">

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