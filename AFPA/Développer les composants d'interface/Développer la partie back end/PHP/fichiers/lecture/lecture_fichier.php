<?php
 $fichier = fopen("liste.txt","r");
 while(!feof($fichier))
{
     $row = fgets($fichier,70);
     $row = rtrim($row);

     echo "<a href=\"".$row."\">$row</a><br>";
}
?>