<?php
session_start();
$login = $_SESSION['login'];
if($login==false){
  require("./db_config.php");
  $errorMessage = "";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $key_security = trim($_POST['key_security']); // Use the correct key name

    // Insecure query (NOT RECOMMENDED FOR PRODUCTION)
    // Replace with prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = '$email' AND key_security = '$key_security'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        session_start();
        $_SESSION['registered_user_email'] = $email;
        $_SESSION['change_password'] = true;
        header('Location: change_password.php');
    } else {
      $errorMessage = "Invalid email or security key!";
      ?>
      <script>
      alert("invalid email or key security");  // Use JavaScript to display alert
    </script>
    <?php
    }
  }

  // Close the database connection
  $conn->close();

}else{
  header('Location: index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Recovery Password</title>
<link rel="stylesheet" href="./css/forgot_password.css">
<script src="./js/hide_showpass.js"></script>
</head>
<body>

<h2>Enter Your Information</h2>

<form id="myForm" method="post" action="">

  <div id="emailError" class="error"></div>  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email">
  <br><br>

  <div id="keyError" class="error"></div>  <label for="key">Security Key:</label>
  <input type="password" id="key_security" name="key_security">
  <br>
  <button type="button" onclick="showHideKey()">Show/Hide Key</button>
  <br><br>

  <button type="submit">Submit</button>
</form>

</body>
</html>