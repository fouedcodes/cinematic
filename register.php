<?php
// Only execute code if form is submitted (POST method)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Database connection details (replace with your actual credentials)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cinemadb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $firstName = $_POST['first_name'];  
  $lastName = $_POST['last_name'];    
  $age = (int) $_POST['age'];           
  $location = $_POST['location'];    
  $phoneNumber = $_POST['phone_number']; 
  $email = $_POST['email'];             
  $email2 = $_POST['email2'];           
  




  if (empty($firstName) || empty($lastName) || empty($email) || empty($email2) || empty($_POST['password']) || empty($_POST['password2'])) {
    echo "Please fill in all required fields.";
  } else if ($email !== $email2) {
    echo "Email addresses do not match.";
  } else if ($_POST['password'] !== $_POST['password2']) {  // Validate password confirmation
    echo "Passwords do not match.";
  } else if($age<=0){
    echo("age must be positive") ;
  } else if($age<=17){
  echo("you are under age") ;
}
  else {

    // Insert user information into database (not secure)
    $sql = "INSERT INTO users (first_name, last_name, age, location, phone_number, email, password)
            VALUES ('$firstName', '$lastName', '$age', '$location', '$phoneNumber', '$email', '".$_POST['password']."')";

    if ($conn->query($sql) === TRUE) {
      echo "Registration successful!"; 
      session_start();  
        $_SESSION['registered_user_email'] = $email;
        $_SESSION['registered_user_firstName'] = $firstName;
        $_SESSION['registered_user_lastName'] = $lastName;
        $_SESSION['registered_user_location'] = $location;
        $_SESSION['registered_user_phoneNumber'] = $phoneNumber;  
        $_SESSION['registered_user_age'] = $age; 
        $_SESSION['blocked_active']=false;           
      

        header('Location: active.php');
        exit;  
      }else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="./css/register.css">
</head>
<body>
  <h1>Register</h1>
  <form id="registrationForm" action="./register.php" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">

    <label for="location">Location:</label>
    <select name="location" id="location">
    <option value="Ariana">Ariana</option>
    <option value="Béja">Béja</option>
    <option value="Ben Arous">Ben Arous</option>
    <option value="Bizerte">Bizerte</option>
    <option value="Gafsa">Gafsa</option>
    <option value="Gabès">Gabès</option>
    <option value="Jendouba">Jendouba</option>
    <option value="Kairouan">Kairouan</option>
    <option value="Kasserine">Kasserine</option>
    <option value="Kébili">Kébili</option>
    <option value="Le Kef">Le Kef</option>
    <option value="Mahdia">Mahdia</option>
    <option value="Manouba">Manouba</option>
    <option value="Médenine">Médenine</option>
    <option value="Monastir">Monastir</option>
    <option value="Nabeul">Nabeul</option>
  <option value="Sfax">Sfax</option>
     <option value="Sidi Bouzid">Sidi Bouzid</option>
     <option value="Siliana">Siliana</option>
     <option value="Sousse">Sousse</option>
     <option value="Tataouine">Tataouine</option>
     <option value="Tozeur">Tozeur</option>
      <option value="Tunis">Tunis</option>
      <option value="Zaghouan">Zaghouan</option>
    </select>

    <label for="phone_number">Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number"> 
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="email">verify Email:</label>
    <input type="email" id="email2" name="email2" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="password">Verify Password:</label>
    <input type="password" id="password2" name="password2" required>
    <button type="button" id="showPasswordButton">Show Passwords</button>
    <button id="submito" type="submit">Register</button>
  </form>

<script src="./js/register.js"></script>
</body>
</html>

