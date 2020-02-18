<?php
class connectionBase
{
    private $host = "localhost";
    private $login = "root";
    private $password = "";
    private $base = "jarditou";
    private $co_db;

    try
    {
        $this->co_db = new PDO("mysql:host=localhost;charset=utf8;dbname=$base",$login,$password);
        $this->co_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        return $co_db;
    }
    catch (exception $exception)
    {
        echo "Erreur :" . $exception->getMessage() . " <br>";
        echo "n° : " . $exception->getCode() ."<br>";
        die("connexion au serveur impossible");
    }

    public function add_produit(int $cat_id, string $reference,string $libelle, int $prix, string $desc, int $stock, string $couleur, string $ajout, int $bloque)
    {

        $requete_ajout = $this->co_db->prepare("INSERT INTO produits
        (pro_cat_id,pro_ref,pro_libelle,pro_prix,pro_description,pro_stock,pro_couleur,pro_d_ajout,pro_bloque)
        VALUES
        (:cat_id,:reference,:libelle,:prix,:desc,:stock,:couleur,:ajout,:bloque)");


        $requete_ajout->bindValue(':reference',$reference);
        $requete_ajout->bindValue(':libelle',$libelle);
        $requete_ajout->bindValue(':desc',$desc);
        $requete_ajout->bindValue(':cat_id',$cat_id, PDO::PARAM_INT);
        $requete_ajout->bindValue(':prix',$prix, PDO::PARAM_INT);
        $requete_ajout->bindValue(':stock',$stock, PDO::PARAM_INT);
        $requete_ajout->bindValue(':couleur',$couleur);
        $requete_ajout->bindValue(':ajout',$date_ajout);
        $requete_ajout->bindValue(':bloque',$block, PDO::PARAM_INT);

        $result = $requete_ajout->execute();
    }

    public function update_produit(int $pro_id, int $cat_id, string $ref,string $lib, int $prix, string $desc, int $stock, string $couleur, string $modif, int $bloque)
    {
        
        $requete = $this->co_db->prepare("UPDATE produits 
        SET pro_cat_id=:cat_id, pro_ref=:ref, pro_libelle=:lib, pro_description = :desc,pro_prix=:prix,pro_stock=:stock,pro_d_modif=:modif,pro_couleur = :couleur,pro_bloque=:bloque
        WHERE pro_id = $pro_id");

        $requete->bindValue(':cat_id',$cat_id,PDO::PARAM_INT);
        $requete->bindValue(':ref',$ref);
        $requete->bindValue(':lib',$lib);
        $requete->bindValue(':prix',$prix,PDO::PARAM_INT);
        $requete->bindValue(':desc',$desc);
        $requete->bindValue(':stock',$stock,PDO::PARAM_INT);
        $requete->bindValue(':modif',$modif);
        $requete->bindValue(':couleur',$couleur);
        $requete->bindValue(':bloque',$block,PDO::PARAM_INT);

       	$requete->execute();
    }

    public function update_extension(int $id, string $extension)
    {
        $insertFormatImage = $this->co_db->prepare("UPDATE produits SET pro_photo=:extension where pro_id=:id");
        $insertFormatImage->bindValue(":extension",$extension);
        $insertFormatImage->bindValue(":id",$id);
        $insertFormatImage->execute();
    }

    public function last_id()
    {
        return $this->co_db->lastInsertId();
    }

}

?>
