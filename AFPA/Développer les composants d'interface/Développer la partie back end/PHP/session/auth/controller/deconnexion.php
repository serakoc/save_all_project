<?php
session_start();
        unset($_SESSION["login"]);
	
        unset($_SESSION["role"]);
        
        if (ini_get("session.use_cookies")) 
        
        {
        
            setcookie(session_name(), '', time()-42000);
        
        }
        session_destroy();
        header("Location:../view/index.php");
?>