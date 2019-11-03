<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

    <body>
    <?php require_once __DIR__ . '/../config/config.php'; ?>

    <?php      
    function getCategorie () {
        $db = new PDO(
        sprintf('mysql:host=%s;dbname=%s;charset=utf8', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),DATABASE_CONFIG['user'], DATABASE_CONFIG['password']);
          $query = $db->query("SELECT * FROM categories") or die($db->error);
          $query->execute();
          return $query->fetchAll();
        }
    
    
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top menu " >
        <div class="container" >
        <a href="#" class="navbar-brand" ><span style="text-align:center">Modification des articles</span></a>
            
        </div>
    </nav>	
    
<div id="bjrAdmin" style="margin-bottom:50px">
<a class="btn btn-info" style="" href="accueilAdmin.php"><span class="fa fa-backward"></span> Gestion des articles</a>

    <div class="container">

<?php
$mysqli = new mysqli('localhost', 'root', '', 'projetbdd') or die($mysqli_error($mysqli)); ?>

<?php 
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM posts WHERE id=$id") or die($mysqli->error());

    $posts = $result->fetch_array();
        $title = $posts['title'];
        $content = $posts['content'];
        $categorie = $posts['idCategory'];
}?>

<div class="row justify-content-center">

<form action="../view/indexAuth.php?controle=crudRepository&action=modifier_article" method="post" style="width:80%; margin-top:50px">

        <div class= "form-group">
                <label>titre</label>
                <input type="text" name="title" class="form-control" 
                value ="<?php echo $title; ?>">

         </div>  

          <div class= "form-group">
                <label>contenu</label>
                <input type="text" name="content" class="form-control" 
                value="<?php echo $content;?>">
            </div>

            <div class= "form-group">
                <label>Categorie</label>
                <input type="text" name="categorie" class="form-control" 
                value="<?php echo $categorie;?>">
            </div>
            
            <div class ="form-group">
			    <button type= "submit" class="btn btn-primary" name="modif">sauvegarder</button>
            </div>

		 </h3></div>
		</fieldset>
			</div>
</form>
            </div>
            </div>

</body>

</html>