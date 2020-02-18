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

<form action="../controller/update_script.php" method="POST">
    <div style="display:flex">
    <div class='col-6'>
        <input name="id" value="<?=$info->disc_id?>" type="hidden">
        <label for="Title">Title</label><br>
        <input name ="Title" id="Title" value="<?=$info->disc_title;?>"><br>
        <label for="year">Year</label><br>
        <input name ="Year" id="year" value="<?=$info->disc_year;?>"><br>
        <label for="Label">Label</label><br>
        <input name ="Label" id="label" value="<?=$info->disc_label;?>"><br>
        <label for="img">Picture</label><br>
        <img class='img-fluid' id ="img" src="../public/images/<?=$info->disc_picture;?>" alt="courture_titre">
        
        <div>
        <a href="delete_script.php?id=<?=$info->disc_id;?>"><input name="suppr" type="button" value="Supprimer"></a>
        <a href="../view/index.php"><input name="retour" type="button" value="Retour"></a>
        </div>
    </div>
    <div class='col-6'>
        <label for="artist">Artist</label><br>
        <select name="Artist" id="artist">
            <?php
                $liste_artist = new connection_bdd();
                $liste = $liste_artist->return_artist();
                for($i = 0; $i < count($liste); $i++)
                {
                    if($liste[$i]->artist_name == $artist->artist_name)
                        echo "<option value=\"" . $liste[$i]->artist_id . "\"selected>". $liste[$i]->artist_name ."</option>";
                    else
                        echo "<option value=\"" . $liste[$i]->artist_id . "\">". $liste[$i]->artist_name ."</option>";
                }
            ?>
        </select><br/>
        <label for="genre">Genre</label><br>
        <select name="genre" id="genre">
        <?php
            /*<input name ="Genre" id="genre" value="<?=$info->disc_genre;?>"><br>*/
            $genre_liste = new connection_bdd();
            $liste = $genre_liste->return_genre();
            for($i = 0; $i < count($liste); $i++)
            {
                if($liste[$i]->disc_genre == $info->disc_genre) 
                echo "<option value=\"".$liste[$i]->disc_genre."\"selected>" . $liste[$i]->disc_genre . "</option>";
                else
                echo "<option value=\"".$liste[$i]->disc_genre."\">" . $liste[$i]->disc_genre . "</option>";
            }
        ?>
        </select><br>
        <label for="price">Price</label><br>
        <input name ="Price" id="price" value="<?=$info->disc_price;?>"><br>
    </div>
    
    </div>
    <input type="submit" id="go" style="width : 100%"value="Valider">
</form>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../public/asset/js/regex_update.js"></script>

</html>