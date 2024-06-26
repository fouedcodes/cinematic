<?php
session_start();
session_destroy();
session_start();
$_SESSION['login']=false;
$_SESSION['blocked_active']=true;
header('Refresh: 5; url=index.php');

echo "You will be redirected to the index page in 5 seconds... because you are logged out see you soon";
?>

