<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body class="container" >
  <a href="add_form.php" class="btn btn-primary" style="width:99%;margin:20px">Ajout de disque</a>
  <a href="add_artist.php" class="btn btn-primary" style="width:99%;margin:20px">Ajout d'artiste</a>
  <?php
    require_once('../model/class_db.php');
    $db = new connection_bdd();
    $disc = $db->fetch_all_disc();
    echo "<div class=\"row\">"; 
    for($i = 0; $i < count($disc); $i++)
    {
        $artist = $db->fetch_by_id_artist($disc[$i]->artist_id);
  ?>
        <div class="card col-4 mb-3" style="width: 18rem;">
                <img class="card-img-top" src="../public/images/<?=$disc[$i]->disc_picture;?>" alt="Card image cap">
                <div class="card-body">
                    <span class="card-title h5"><?=$disc[$i]->disc_title;?></span>
                    <p class="card-text">Artiste : <?=$artist->artist_name;?></p>
                    <p class="card-text">Année : <?=$disc[$i]->disc_year;?></p>
                    <p class="card-text">Label : <?=$disc[$i]->disc_label;?></p>
                    <p class="card-text">Genre : <?=$disc[$i]->disc_genre;?></p>
                    <a href="details.php?id=<?=$disc[$i]->disc_id;?>" class="btn btn-primary">Détails</a>
                </div>
        </div>
    <?php
      }
    ?>

  </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>