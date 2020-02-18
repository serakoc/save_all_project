<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="../controller/signin_script.php">
        <label for="user">USER : </label><br>
        <input type="text" id="user" name="user"><br>

        <label for="mdp">MOT DE PASSE : </label><br>
        <input type="text" id="mdp" name="mdp"><br>

        <label for="mdpc">MOT DE PASSE CONFIRM: </label><br>
        <input type="text" id="mdpc" name="mdp_c"><br>

        <label for="nom">NOM : </label><br>
        <input type="text" id="nom" name="nom"><br>

        <label for="prenom">PRENOM : </label><br>
        <input type="text" id="prenom" name="prenom"><br>

        <input type="submit" value="s'inscrire">
    </form>

</body>
</html>