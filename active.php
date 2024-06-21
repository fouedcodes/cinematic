<?php

//DATA of SESSION and KEY
session_start();
    //STOP coding from running twice
    
    if($_SESSION['blocked_active']==false){
        if (isset($_SESSION['registered_user_email'])) {
            $email = $_SESSION['registered_user_email'];
        
            $firstName = $_SESSION['registered_user_firstName'];
            $lastName = $_SESSION['registered_user_lastName'];
        } else {
            echo "you are not logged in";
            header('Location: info.php');
          }
        
        
            require('./controller/key_security.php');
            require('./controller/insert_key_security.php');
        
        
    }else{
        header('Location: index.php');
    }






?>