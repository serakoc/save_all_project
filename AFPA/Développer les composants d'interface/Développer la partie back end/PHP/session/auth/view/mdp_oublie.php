<?php 
$random = random_int ( 128 , 128 );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/send_forgot.php" method="POST">

        <input name="id" value=<?=$random?> hidden>

        <label for="user">email : </label>
        <input id="user" type="text" name="user">

        <input type="submit" value="retrouver son mdp">
    </form>
</body>
</html>