<?php
    /*difference de date entre maintenant et fin de formation (affichage du nombre de jours restant)*/
    $date = new datetime();
    $date_of_the_end = new datetime("2020-09-25");
    $when_the_end = $date->diff($date_of_the_end);
    echo $when_the_end->format('%a days');
    /*comment déterminer si une année est bissextile*/
    $date = new datetime("2020-09-25");
    $annee = $date->format("Y");
    $bi = false;
    if(!($annee % 400))
    {
        $bi=true;
    }
    else if(!($annee % 4 || !($annee % 100)))
    {
        $bi=true;
    }
    else
    {
        $bi=false;
    }

    if($bi)
    {
        echo "année bisextile";
    }
    else
    {
        echo "annee normal";
    }
    /*montrer qu'une date est erronée*/
    $date = DateTime::createFromFormat('j/m/Y',"32/17/2019");
    $errors = DateTime::getLastErrors();
        
    if ($errors["error_count"]>0 || $errors["warning_count"]>0) 
    {
        echo "error";
    }
    /*changer le format d'une heure*/
    $date = new datetime();
    echo $date->format("H\hi");
    /*ajouter 1 mois a la date courante*/
    $date = new datetime();
    $date->add(new DateInterval('1M'));
    echo $date->format('d-m-Y');
    /* que s'est-il passée le 1000200000 */
    echo ('d/m/Y H:i:s',1000200000);
?>