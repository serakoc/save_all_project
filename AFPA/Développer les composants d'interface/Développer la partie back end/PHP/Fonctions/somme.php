<?php
    function somme(array $tab)
    {
        $somme = 0;
        foreach($tab as $key)
        {
            $somme += $key;
        }
        return $somme;
    }
    echo somme(array(5,5,15,5));
    
    
?>