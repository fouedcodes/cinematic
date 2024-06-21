<?php
// Include your database connection details
require('./db_config.php');

$_SESSION['registered_user_key_security'] = $key_security;        
    // User email (replace with how you retrieve the user email)
    $userEmail = $email;  // Replace with actual retrieval logic
    
    // Database table and column names (replace with your values)
    $table_name = 'users';
    $key_column = 'key_security';
    
    // Construct the UPDATE query to save the key
    $updateSql = "UPDATE $table_name SET $key_column = '$key_security' 
                   WHERE email = '$userEmail' LIMIT 1";
    
    // Execute the UPDATE query
    if ($conn->query($updateSql) === TRUE) {
      // Key saved successfully, append key to file
      $keyFile = './data/keys.txt';  // Replace with your actual path
      $saving=$key_security."  => ".$email;
      file_put_contents($keyFile, $saving . PHP_EOL, FILE_APPEND);  // Append key with newline
      $_SESSION['blocked_active'] =true;
      $_SESSION['login'] =true;

      header('Location: info.php');
    } else {
      echo "Error saving key to database: " . $conn->error;
    }

    // Close the connection
    $conn->close();

    ?>