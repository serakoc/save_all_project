<?php
    require_once('../model/class_db.php');

    $url = $_POST["url"];
    $name = $_POST["artist_name"];

    if($name)
    {
        if($url)
        { 
            $db = new connection_bdd();
            $db->add_artist_all($name,$url);  
        }
        else
        {
            $db = new connection_bdd();
            $db->add_artist($name);  
        }
    }
    header("Location:../view/index.php");
?>