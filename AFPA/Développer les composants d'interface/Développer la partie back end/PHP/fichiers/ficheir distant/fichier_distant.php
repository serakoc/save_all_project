<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Document</title>
</head>
<body>
    <table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Télephone</th>
            <th>Ville</th>
            <th>états</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $tab_distant = file("customers.csv");
        foreach($tab_distant as $key)
        {
            echo "<tr>";
            $xplode_row = explode(',',$key);
            echo "<td>" . $xplode_row[0] . "</td>";
            echo "<td>" . $xplode_row[1] . "</td>";
            echo "<td>" . $xplode_row[2] . "</td>";
            echo "<td>" . $xplode_row[3] . "</td>";
            echo "<td>" . $xplode_row[4] . "</td>";
            echo "<td>" . $xplode_row[5] . "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table> 
</body>
</html>
