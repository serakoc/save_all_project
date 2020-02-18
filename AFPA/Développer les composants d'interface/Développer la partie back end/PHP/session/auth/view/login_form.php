<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="../controller/login_script.php">
        <label for="user">USER : </label><br>
        <input type="text" id="user" name="user"><br>

        <label for="mdp">MOT DE PASSE : </label><br>
        <input type="text" id="mdp" name="mdp"><br>

        <input type="submit" value="se connecter">
        <a href="mdp_oublie.php" alt = "mot de passe oublié">Mot de passe oublié</a>
    </form>
</body>
</html>