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
<?php
    $id = $_GET["id"];
    require_once('../model/class_db.php');
    $disc = new connection_bdd();
    $info = $disc->fetch_by_id_disc($id);
    $disc = new connection_bdd();
    $artist = $disc->fetch_by_id_artist($info->artist_id);
?>
<div style="display:flex">
    <div class='col-6'>
        <h5>Title</h5>
        <input name ="Title" value="<?=$info->disc_title;?>" readonly>
        <h5>Year</h5>
        <input name ="Year" value="<?=$info->disc_year;?>" readonly>
        <h5>Label</h5>
        <input name ="Label" value="<?=$info->disc_label;?>" readonly>
        <h5>Picture</h5>
        <img class='img-fluid' src="../public/images/<?=$info->disc_picture;?>" alt="courture_titre">
        
        <div>
        <a href="update_form.php?id=<?=$info->disc_id;?>"><input name="modif" type="submit" value="Modifier"></a>
        <a href="../controller/delete_script.php?id=<?=$info->disc_id;?>"><input name="suppr" type="submit" id="delete" value="Supprimer"></a>
        <a href="index.php"><input name="retour" type="submit" value="Retour"></a>
        </div>
    </div>
    <div class='col-6'>
        <h5>Artist</h5>
        <input name ="Artist" value="<?=$artist->artist_name?>" readonly>
        <h5>Genre</h5>
        <input name ="Genre" value="<?=$info->disc_genre;?>" readonly>
        <h5>Price</h5>
        <input name ="Price" value="<?=$info->disc_price;?>" readonly>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../public/asset/js/confirmation_sup.js"></script>
</html>