<?php
    require_once('../model/class_db.php');
    $id = $_POST["id"];
    $title = $_POST["Title"];
    $year = $_POST["Year"];
    $label = $_POST["Label"];
    $genre = $_POST["genre"];
    $price = $_POST["Price"];
    $artist = $_POST["Artist"];
    $db = new connection_bdd();
    $db->update($id,$title,$year,$label,$genre,$price,$artist);
    header("Location:../view/index.php");
?>