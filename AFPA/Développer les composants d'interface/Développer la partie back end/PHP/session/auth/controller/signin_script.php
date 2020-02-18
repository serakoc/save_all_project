<?php
    require_once('../model/class_db.php');

    $co = new connection_bdd();
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $reg = "#(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\,\;\:\!\?\.\/\§\ù\*\^\$\%\µ\¨\£\ù\*\+\^\¤\=\)\à\ç\_\è\-\(\'\"\é\&\~\#\{\[\|\`\^\@\}\^\ù])^[a-zA-Z0-9\,\;\:\!\?\.\/\§\ù\*\^\$\%\µ\¨\£\ù\*\+\^\¤\=\)\à\ç\_\è\-\(\'\"\é\&\~\#\{\[\|\`\^\@\}\^\ù]{8,30}$#" ;
    $regUser = "#^[a-zA-z0-9\-\_\.éèçàùôîûïüë\ ()<>@,;:\"[\]|ç%&,]+@[a-zA-Z]{2,10}.[a-z]{2,5}$#";
    $exist = $co->user_exist($_POST["user"]);
    if (!$exist)
    {
        if ($_POST["mdp"] === $_POST["mdp_c"])
        { 
            if(preg_match($reg,$_POST["mdp"]))
            {
                if(preg_match($regUser,$_POST["user"]))
                {
                    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
                    $co->add_user($_POST["user"],$mdp,$nom,$prenom);
                    header('Location:../view/index.php');
                }
                else
                {
                    echo "USER FORMAT : test@test.test";
                    header('refresh: 5 ; url=../view/index.php');
                }
            }
            else 
            {
                echo "Le MDP doit contenir 1 lettre minuscule, 1 lettre majuscule, 1 chiffre et un 1 caractère spéciale (entre 8 et 30 caractères)";
                header('refresh: 5 ; url=../view/index.php');
            }
        }
        else 
        {
            echo "L'MDP NE CORRESPONDENT PAS!";
            header('refresh: 5 ; url=../view/index.php');
        }


    }
    else 
    {
        echo "L'USER EXISTE DéJA !";
        header('refresh: 5 ; url=../view/index.php');
    }
?>