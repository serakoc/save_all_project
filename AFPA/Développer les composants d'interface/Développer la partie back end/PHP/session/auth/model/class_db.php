<?php

class connection_bdd
{
    private $co_db;
    private $host = "localhost";
    private $login = "root";
    private $password = "";
    private $base = "user";
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

    public function add_user($user,$hash,$nom,$prenom)
    {
        $requete = $this->co_db->prepare("INSERT INTO information_user VALUES (:user,:hasho,0,:nom,:prenom)");
        $requete->bindValue(':user',$user);
        $requete->bindValue(':hasho',$hash);
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':prenom',$prenom);
        $requete->execute();
    }

    public function user_exist($user)
    {
        $requete = $this->co_db->prepare("SELECT COUNT(email) as nbr_email FROM information_user WHERE email = :user");
        $requete->bindValue(":user",$user);
        $requete->execute();
        if ($requete->fetch()->nbr_email)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function pass_by_user($user)
    {
        $requete = $this->co_db->prepare("SELECT pass FROM information_user WHERE email = :user");
        $requete->bindValue(":user",$user);
        $requete->execute();
        return $requete->fetch()->pass;
    }

    public function try_user($user)
    {
        $requete = $this->co_db->prepare("SELECT essai FROM information_user WHERE email = :user");
        $requete->bindValue(":user",$user);
        $requete->execute();
        return $requete->fetch()->essai;
    }

    public function plus_try($user,$value)
    {
        $requete = $this->co_db->prepare("UPDATE information_user SET essai = :essaie WHERE email = :user");
        $requete->bindValue(":user",$user);
        $requete->bindValue(":essaie",$value);
        $requete->execute();
    }

    public function all_info($user)
    {
        $requete = $this->co_db->prepare("SELECT * FROM information_user WHERE email = :user");
        $requete->bindValue(":user",$user);
        $requete->execute();
        return $requete->fetch();
    }

    public function send_key($email,$code)
    {
        $requete = $this->co_db->prepare("INSERT INTO forgot (email,code) VALUES (:email,$code)");
        $requete->bindValue(":email",$email);
        $requete->execute();
    }

    public function key_by_email($email)
    {
        $requete = $this->co_db->prepare("SELECT code FROM forgot WHERE email=:email");
        $requete->bindValue(":email",$email);
        $requete->execute();
        return $requete->fetch();
    }

    public function delete_code($email)
    {
        $requete = $this->co_db->prepare("DELETE FROM forgot WHERE email=:email");
        $requete->bindValue(":email",$email);
        $requete->execute();
    }

    public function modify_pass($email,$mdp)
    {
        $requete = $this->co_db->prepare("UPDATE information_user SET pass = :pass WHERE email = :email");
        $requete->bindValue(":email",$email);
        $requete->bindValue(":pass",$mdp);
        $requete->execute();
    }
    
}

?>