<?php
    session_start();

    $_SESSION["test"] = "valeur de test";
    $_SESSION["autre_test"] = "autre valeur de test";

    echo $_SESSION["test"]."<br>";
    echo session_id();
    var_dump($_SESSION);
    unset($_SESSION["autre_test"]);
	
    unset($_SESSION["test"]);
	
    if (ini_get("session.use_cookies")) 
	
    {
	
        setcookie(session_name(), '', time()-42000);
	
    }
    session_destroy();
?>
