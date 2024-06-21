<?php

// Function to generate a secure random string
function generateSecurityKey($length = 32) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $key = '';
  for ($i = 0; $i < $length; $i++) {
    $randomIndex = random_int(0, $charactersLength - 1);
    $key .= $characters[$randomIndex];
  }
  return $key;
}

// Generate a new key
$key_security = generateSecurityKey();



?>
