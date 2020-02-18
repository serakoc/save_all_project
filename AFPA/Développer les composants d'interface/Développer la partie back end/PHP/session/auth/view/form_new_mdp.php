<?php
    session_start();

    require_once("../model/class_db.php");

    if(!isset($_SESSION["email"]))
    {
        $_SESSION["email"] = $_GET["email"];
    }
    $code = new connection_bdd();
    $ok = $code->key_by_email($_SESSION["email"]);
    $scrt = $ok->code;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        if(isset($_POST["code"]))
        {   
            if($_POST["code"] == $scrt)
            {   
                $_SESSION["code"] = "enabled";
                ?>
                <form action="../controller/modify_pass.php" method="POST">
                <label for="new">NOUVEAU MDP :</label> 
                <input type="text" id="new" name="new">
                <label for="new_c">CONFIRMER LE NOUVEAU MDP :</label> 
                <input type="text" id="new_c" name="new_c">
                <input type="submit" value="modifier mon mot de passe">
                </form>
        <?php }
        }
        else
        {
        ?>
            <form action="form_new_mdp.php" method="POST">
            <label for="code">CODE :</label> 
            <input type="text" id="code" name="code">
            <input type="submit" value="valider mon code">
            </form>
    <?php
        }
    ?>
</body>
</html>