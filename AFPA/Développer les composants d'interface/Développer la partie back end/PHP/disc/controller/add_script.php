<?php
    require_once('../model/class_db.php');
    $title = $_POST["Title"];
    $year = $_POST["Year"];
    $label = $_POST["Label"];
    $genre = $_POST["genre"];
    $price = $_POST["Price"];
    $artist = $_POST["Artist"];

    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["img"]["tmp_name"]);
    finfo_close($finfo);
	
 

    if($_FILES['img']['error'] > 0)
    {
        $name_pic = $title.".jpg";
        $tmp_name = "../public/images/no_image.jpg";
        copy($tmp_name,"../public/images/$name_pic");
    }
    else
    {
        if (in_array($mimetype, $aMimeTypes))	
        {
            $tmp_name = $_FILES['img']['tmp_name'];
            $extension = substr(strrchr($_FILES["img"]["name"], "."), 1);  
            $name_pic = $title.".".$extension;
            move_uploaded_file($tmp_name, "../public/images/$name_pic");  
        } 
        else 
        {
            $name_pic = $title.".jpg";
            $tmp_name = "../public/images/no_image.jpg";
            copy($tmp_name,"../public/images/$name_pic");
        }        
    }
  
    $db = new connection_bdd();
    $db->add($title,$year,$label,$genre,$price,$artist,$name_pic);  
    header("Location:../view/index.php");
?>