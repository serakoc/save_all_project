<?php
class connection_bdd
{
    private $co_db;
    private $host = "localhost";
    private $login = "root";
    private $password = "";
    private $base = "record";
    function __construct()
    {
        try
        {
            $this->co_db = new PDO("mysql:host=localhost;charset=utf8;dbname=".$this->base,$this->login,$this->password);
            $this->co_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        }
        catch (exception $exception)
        {
            echo "Erreur :" . $exception->getMessage() . " <br>";
            echo "n° : " . $exception->getCode() ."<br>";
            die("connexion au serveur impossible");
        }
    }

    public function fetch_all_disc()
    {
        $requete = $this->co_db->prepare('SELECT * FROM disc');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function fetch_all_artist()
    {
        $requete = $this_co_db->prepare('SELECT * FROM artist');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function fetch_by_id_artist(int $id)
    {
        $requete = $this->co_db->prepare('SELECT * FROM artist where artist_id = :id');
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }

    public function fetch_by_id_disc(int $id)
    {
        $requete = $this->co_db->prepare('SELECT * FROM disc where disc_id = :id');
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }
    public function id_by_name(string $name)
    {
        $requete = $this->co_db->prepare("SELECT DISTINCT artist_id FROM artist WHERE artist_name = :nam");
        $requete->bindValue(':nam',$name);
        $requete->execute();
        return $requete->fetch();
    }
    public function del_id(int $id)
    {
        $requete = $this->co_db->prepare('DELETE FROM disc WHERE disc_id = :id');
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        return $requete->execute();
    }
    public function return_genre()
    {
        $requete = $this->co_db->prepare('SELECT DISTINCT disc_genre FROM disc');
        $requete->execute();
        return $requete->fetchAll();
    }
    public function add(string $title, int $year, string $label, string $genre, $price, string $artist_name, string $name)
    {
        $artist = $this->id_by_name($artist_name);
        $requete = $this->co_db->prepare("INSERT INTO disc (disc_title,disc_year,disc_label,disc_genre,disc_picture,disc_price,artist_id) VALUES(:ti,:ye,:lab,:gen,:picture,:price,$artist_name)");
        $requete->bindValue(':ti',$title);
        $requete->bindValue(':ye',$year,PDO::PARAM_INT);
        $requete->bindValue(':lab',$label);
        $requete->bindValue(':gen',$genre);
        $requete->bindValue(':picture',$name);
        $requete->bindValue(':price',$price);

        var_dump($requete->execute());
    }
    public function update(int $id, string $title, int $year, string $label, string $genre, $price, string $artist_id)
    {
        
        $requete = $this->co_db->prepare("UPDATE disc SET disc_title = :ti, disc_year= :ye,disc_label= :lab,disc_genre= :gen,disc_price= :price,artist_id= :art WHERE disc_id= :id");
        $requete->bindValue(':ti',$title);
        $requete->bindValue(':ye',$year,PDO::PARAM_INT);
        $requete->bindValue(':lab',$label);
        $requete->bindValue(':gen',$genre);
        $requete->bindValue(':price',$price);
        $requete->bindValue(':art',$artist_id,PDO::PARAM_INT);
        $requete->bindValue(':id',$id,PDO::PARAM_INT);
        $requete->execute();
    }
    public function return_artist()
    {
        $requete = $this->co_db->prepare("SELECT * FROM artist");
        $requete->execute();
        return $requete->fetchAll();
    }

    public function add_artist_all($artist_name, $artist_url)
    {
        $requete = $this->co_db->prepare("INSERT INTO artist (artist_name,artist_url) VALUES (:ARTIST, :URL)");
        $requete->bindValue(':ARTIST',$artist_name);
        $requete->bindValue(':URL',$artist_url);
        $requete->execute();
    }
    public function add_artist($artist_name)
    {
        $requete = $this->co_db->prepare("INSERT INTO artist (artist_name) VALUES (:ARTIST)");
        $requete->bindValue(':ARTIST',$artist_name);
        $requete->execute();
    }
}
  
?>