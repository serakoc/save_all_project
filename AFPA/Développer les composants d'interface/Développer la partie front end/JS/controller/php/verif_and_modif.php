<?php
    require("connexion_bdd.php");
    $db=new connectionBase();

    $pro_id = $_POST["id"];
    $cat_id = $_POST["cat"];
    $ref = $_POST["ref"];
    $lib = $_POST["lib"];
    $prix = $_POST["prix"];
    $stock = $_POST["stock"];
    $couleur = $_POST["couleur"];
    $modif = date("Y-m-d-h-m-s");
    $desc = $_POST["desc"];
    $block = $_POST['block'];

    $valide=false;

    if (empty($ref) || !preg_match("#^[a-zA-Z_\-0-9]{2,20}$#",$ref))
    {
        echo "<p>Seulement des lettres et chiffres. (symbole autorisé : -_). 2-20 caracteres.</p>";
    }
    else
    {
        $valide = true;
    }

    if (empty($lib) || !preg_match("#^[a-zA-Z0-9\ ]{2,20}$#",$lib))
    {
        echo "<p>Lettres et chiffres seulement. 2-20 caracteres.</p>";
    }
    else
    {
        $valide = true;
    }

    if (empty($prix) || !preg_match("#^[0-9\.]+$#",$prix))
    {
        echo "<p>prix : seulement des chiffres !</p>";
    }
    else
    {
        $valide = true;
    }

    if (empty($stock) || !preg_match("#^[0-9]+$#",$stock))
    {
        echo "<p>stock : seulement des chiffres !</p>";
    }
    else
    {
        $valide = true;
    }

    if (empty($couleur) || !preg_match("#^[a-zA-Z]{3,10}$#",$couleur))
    {
        echo "<p>seulement des lettres ! 3-10 caractères </p>";
    }
    else
    {
        $valide = true;
    }

    if($valide == true)
    {
        if ($block == "oui")
        {
            $block = 1;
        }

        if ($block == "non")
        {
            $block = null;
        }

        $db->update_produit($pro_id, $cat_id,$ref,$lib, $prix,$desc, $stock,$couleur,$modif, $bloque);
        
        header('Location:../view/tableau.php');
	
    }

?>
