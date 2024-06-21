<?php
session_start();
if($_SESSION['registered_user_email']){
    $email=$_SESSION['registered_user_email'] ;
    $firstName=$_SESSION['registered_user_firstName'] ;
    $key_security=$_SESSION['registered_user_key_security'];    
    $lastName=$_SESSION['registered_user_lastName'] ;

}else{
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>welcome <?php echo $firstName. " ". $lastName ?></H1>
    <h3>Email: <?php echo $email ?> </h3>
    <h3>PLEASE SAVE THIS CODE "ITS ONLY WAY TO RECOVERY YOUR ACCOUNT"</h3>
    <h4>Security Code :<?php echo $key_security  ?> </h4>
    <h3>When you are ready click here to go to your profil : <a href="#">click</a></h3>
</body>
</html>