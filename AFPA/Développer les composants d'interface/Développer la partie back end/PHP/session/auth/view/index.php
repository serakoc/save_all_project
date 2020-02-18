<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        if(isset($_SESSION["auth"]))
        {
        ?>
    <p>Vous etes co</p>
    <p>votre login est : <?=$_SESSION["email"]?></p>
    <p>votre id de session est le :<?=$_SESSION["id_session"]?></p>
    <p>votre nom :<?=$_SESSION["nom"]?></p>
    <p>votre prenom :<?=$_SESSION["prenom"]?></p>
    <a href="../controller/deconnexion.php" alt="Deconnexion">Déconnexion</a>
    <?php
        }
        else
        {
    ?>
    <a href="login_form.php" alt="se connecter">Se connecter</a>
    <a href="Signin_form.php" alt="s'inscrire">S'inscrire</a>
    <?php } ?>
    
</body>
</html>