<?php
    function lien (string $lien, string $contenu)
    {
        echo "<a href=\"" . $lien . "\">". $contenu . "</a>";
    }
    lien("test","ok ??");
    
?>