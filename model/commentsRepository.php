<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
<?php

require_once __DIR__ . '/../config/config.php';

function getComments ()
{
    $db = connect();
    if(isset($_GET['idCat'])){
        $idComments=$_GET['idCat'];
        $query = $db->prepare("SELECT * FROM comments where idPost=$idComments");
        $query->execute();
        return $query->fetchAll();
    }
 
}
?>
</html>