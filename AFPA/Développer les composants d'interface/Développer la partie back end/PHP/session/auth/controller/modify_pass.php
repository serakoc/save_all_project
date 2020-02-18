<?php
session_start();
if ($_SESSION["code"] == "enabled")
{
    $reg = "#(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\,\;\:\!\?\.\/\§\ù\*\^\$\%\µ\¨\£\ù\*\+\^\¤\=\)\à\ç\_\è\-\(\'\"\é\&\~\#\{\[\|\`\^\@\}\^\ù])^[a-zA-Z0-9\,\;\:\!\?\.\/\§\ù\*\^\$\%\µ\¨\£\ù\*\+\^\¤\=\)\à\ç\_\è\-\(\'\"\é\&\~\#\{\[\|\`\^\@\}\^\ù]{8,30}$#" ;

    require_once("../model/class_db.php");
    $mdp = $_POST["new"];
    $mdp_c = $_POST["new_c"];
    $mail = $_SESSION["email"];

    if ($mdp === $mdp_c)
    { 
        if(preg_match($reg,$mdp))
        {
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
            $co = new connection_bdd();
            $co->modify_pass($mail,$mdp_hash);
            $co->delete_code($mail);

            unset($_SESSION["code"]);
            unset($_SESSION["email"]);
            if (ini_get("session.use_cookies")) 
            {
                setcookie(session_name(), '', time()-42000);
            }
            session_destroy();
        }
        else
        {
            echo "La regex ne correspond pas ! 1 chiffre, 1 lettre minuscule, 1 lettre majuscule et 1 caractèrers spéciales";
        }
        header('Location:../view/index.php');
    }
    else
    {
        echo "les 2 mots de passe ne correspondent pas !";
    }
}
else
{
    echo "VOUS N'ETES PAS AUTORISE A VOIR SA";
}

?>