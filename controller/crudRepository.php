<?php
$title= '';
$content= '';
$categorie ='';
$id ='';
 
session_start();
require_once __DIR__ . '/../config/config.php';
function connect2 ()
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
        function creer_article(){
            $db = connect2();
            if(isset($_POST['save'])){
                $title= $_POST['title'];
                $content = $_POST['content'];
                $categorie = $_POST['selectCat'];
               
            }
                $query = $db->prepare("INSERT INTO posts(title, content, idCategory) values('$title','$content', '$categorie')");
                $query->execute();
                $_SESSION['message'] = "l'article a été créer!";
                $_SESSION['msg_type'] = "success";
                header("location: ../view/accueilAdmin.php");

    if (isset($_FILES['photo']['tmp_name'])) {
        $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['photo']['name'] . '">';
        }
    }
}

if(isset($_GET['delete'])){        
 $db = connect2();
$id =$_GET['delete'];
$query = $db->prepare("DELETE FROM posts WHERE id=$id ");
$query->execute();

$_SESSION['message'] = "l'article a été supprimié!";
$_SESSION['msg_type'] = "danger";

header("location: ../view/accueilAdmin.php");

}


function creer_categorie(){
    $db = connect2();
    if(isset($_POST['saveCat'])){
        $nom= $_POST['nom'];
       
    }
        $query = $db->prepare("INSERT INTO categories(name) values('$nom')");
        $query->execute();
        $_SESSION['message'] = "la categorie a été créee !";
        $_SESSION['msg_type'] = "success";
        header("location: ../view/categorie/accueil.php");
}

if(isset($_GET['deleteCat'])){        
    $db = connect2();
   $id =$_GET['deleteCat'];
   $query = $db->prepare("DELETE FROM categories WHERE id=$id ");
   $query->execute();
   $_SESSION['message'] = "la categorie a été supprimiée !";
   $_SESSION['msg_type'] = "danger";
   header("location: ../view/categorie/accueil.php");
}

function modifier_article(){
    $db = connect2();
    
     if (isset($_POST['modif'])){
         $id = $_POST['id'];
         $title = $_POST['title'];
         $content = $_POST['content'];
         $categorie = $_POST['categorie'];
        $query = $db->prepare("UPDATE posts SET title='$title', content='$content', idCategory='$categorie' WHERE id=$id ");
        $query->execute();
    
        $_SESSION['message'] = "l'article a bien été modifié!";
        $_SESSION['msg_type'] = "warning";
        header("location: ../view/accueilAdmin.php");

    }

     }


?>
   

