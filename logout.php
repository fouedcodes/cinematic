<?php

session_start();

// Destroy the session
session_destroy();
$_SESSION['login']=false;
$_SESSION['blocked_active']=true;
header('Location: index.php');

?>

