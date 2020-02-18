<?php
require_once("../model/class_db.php");
$req_del = new connection_bdd();
$req_del->del_id($_GET['id']);
header('Location:../view/index.php');
?>