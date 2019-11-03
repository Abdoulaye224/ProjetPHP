<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
<?php
require_once __DIR__ . '/../config/config.php';

function connect ()
{
    try {
        return new PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=utf8', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),
            DATABASE_CONFIG['user'],
            DATABASE_CONFIG['password']
        );
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
function getArticles ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM posts');
    $query->execute();

    return $query->fetchAll();
}

function getArticleContent ()
{
    $db = connect();

    if(isset($_GET['idCat'])){
        $id=$_GET['idCat'];
        $query = $db->prepare("SELECT content FROM posts where id=$id ");
        $query->execute();
        return $query->fetchAll();
    }
}

function getArticleImage(){
    $db = connect();

    if(isset($_GET['idCat'])){
        $id=$_GET['idCat'];
        $query = $db->prepare("SELECT imagePath FROM posts where id=$id ");
        $query->execute();
        return $query->fetchAll();
    }
}
?>


</html>
