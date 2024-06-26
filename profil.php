<?php
session_start();
if($_SESSION['registered_user_email']){
    require("./db_config.php");

    // Prepare a statement (Prevents SQL Injection)
$sql = "SELECT id, first_name, last_name, age, location, phone_number, email FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);

// Bind the email parameter (Securely binds data)
$email = $_SESSION['registered_user_email']; // Assuming email is passed in URL
mysqli_stmt_bind_param($stmt, "s", $email);

// Execute the statement
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);  // Get results from prepared statement

// Check if any results found
if (mysqli_num_rows($result) > 0) {
  // Output data of each row (without password & key_security)
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"] . "<br>";
    echo "First Name: " . $row["first_name"] . "<br>";
    echo "Last Name: " . $row["last_name"] . "<br>";
    echo "Age: " . $row["age"] . "<br>";
    echo "Location: " . $row["location"] . "<br>";
    echo "Phone Number: " . $row["phone_number"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "<br>";
    $_SESSION['login']=true;
  }

} else {
  echo "No results found for email: " . $email;
}

mysqli_stmt_close($stmt); 

    $conn->close();

}else{
    header('Location: index.php');
}
?>