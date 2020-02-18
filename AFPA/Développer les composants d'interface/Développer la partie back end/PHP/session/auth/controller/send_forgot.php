<?php

    require_once("../model/class_db.php");
    $user = $_POST["user"];
    $co = new connection_bdd();
    $co->delete_code($user);
    $code = random_int(10000000,99999999);
    if($co->user_exist($user))
    {
        $co->send_key($user,$code);

        mail($user,
	
        'MOT DE PASSE OUBLIé ?',
        
        "Salut, va la bas : localhost/auth/view/form_new_mdp.php?email=". $user ." et entre ton code : ". $code."!",
   
        array('From' => 'mot_de_pass_oublié@jarditou.com',

               'X-Mailer' => 'PHP/' . phpversion() 
            )
       );
       echo "VERIFIER VOS MAILS !";
       header('refresh: 5 ; url=../view/index.php');
    }
    
    else
    {
        echo "l'utilisateur n'a pas été trouvée";
        header('refresh: 5 ; url=../view/mdp_oublie.php');
    }
?>