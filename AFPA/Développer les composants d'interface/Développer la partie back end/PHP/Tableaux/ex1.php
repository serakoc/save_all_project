<?php
    $tab_mois = array(
        "Janvier" => 31,
        "Février" => 28,
        "Mars" => 31,
        "Avril" => 30,
        "Mai" => 31,
        "Juin" => 30,
        "Juillet" => 31,
        "Aout" => 31,
        "Septembre" => 30,
        "Octobre" => 31,
        "Novembre" => 30,
        "Décembre" => 31
    );
    foreach($tab_mois as $key => $value)
    {
        echo $key . " : " . $value . " <br>";
    }
    sort($tab_mois);
    foreach($tab_mois as $key => $value)
    {
        echo $key . " : " . $value . " <br>";
    }
?>