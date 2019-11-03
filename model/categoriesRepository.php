<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
<?php

require_once __DIR__ . '/../config/config.php';

function getCategories ()
{
    $db = connect();

    if(isset($_GET['idCat'])){
        $idc=$_GET['idCat'];
        $query = $db->prepare("SELECT * FROM categories where id=$idc ");
        $query->execute();
        return $query->fetchAll();
    }
   

 
}
?>
</html>