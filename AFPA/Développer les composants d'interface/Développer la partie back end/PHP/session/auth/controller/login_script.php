<?php
    session_start();
    require_once('../model/class_db.php');
    $co = new connection_bdd();
    $user = $_POST["user"];
    $password = $_POST["mdp"];

    $exist = $co->user_exist($user);
    $nbr_essaie = $co->try_user($user);

    if ($exist && $nbr_essaie < 3)
    {
        $pass = $co->pass_by_user($user);
        $response_auth = password_verify($password,$pass);
        if($response_auth)
        {
            $all_info = $co->all_info($user);
            $_SESSION["auth"] = "ok";
            $_SESSION["id_session"] = session_id();
            $_SESSION["nom"] = $all_info->nom;
            $_SESSION["prenom"] = $all_info->prenom;
            $_SESSION["email"] = $all_info->email;
            $co->plus_try($user,0);
        }
        else
        {
            unset($_SESSION["auth"]);
            $co->plus_try($user,$nbr_essaie+1);
        }
    }
    header("Location:../view/index.php");
?>