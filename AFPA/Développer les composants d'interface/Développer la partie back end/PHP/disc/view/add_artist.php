<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="container">
<h3 class="text-center" style="background:grey">Détails<h3>

<form action="../controller/add_artist.php" method="POST">
    <div style="display:flex">
    <div class='col-6'>

        <label for="artist_name">Nom de l'artiste</label><br>
        <input name ="artist_name" id="artist_name"><br>

        <label for="url">url format :<br> http(s?)://www.votre_lien.domaine</label><br>
        <input name ="url" id="url"><br>

        <div>
        <a href="../view/index.php"><input name="retour" type="button" value="Retour"></a>
        </div>
    
    </div>
    <input type="submit" id="go" style="width : 100%"value="Valider">
</form>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../public/asset/js/regex_artist.js"></script>
</html>