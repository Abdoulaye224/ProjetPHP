<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

        <div id="enteteAdmin" style="margin-bottom:100px">
        <?php require("enteteAdmin.php"); ?>
        </div>


<div id="bjrAdmin" style="margin-bottom:50px">
<p> Bienvenue dans l'espace Administrateur, Gestion des articles <a class="btn btn-dark" style="float: center; margin-left:60px" href="#NewArticle"> CREER NOUVEL ARTICLE</a><a class="btn btn-info" style="float: right" href="categorie/accueil.php"><span class="fa fa-forward"></span> Gestion des categories</a> </p>


</div>

</div>
        <?php require_once __DIR__ . '/../config/config.php'; ?>
        <?php require_once ("../controller/crudRepository.php"); ?>


    <?php
        if(isset($_SESSION['message'])): ?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
<?php endif ?>
          <div class="container">
            <?php
            function getArticle () {
            $db = new PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=utf8', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),DATABASE_CONFIG['user'], DATABASE_CONFIG['password']);
              $query = $db->query("SELECT * FROM posts") or die($db->error);
              $query->execute();
              return $query->fetchAll();
            }

            function getCategorie () {
                $db = new PDO(
                sprintf('mysql:host=%s;dbname=%s;charset=utf8', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),DATABASE_CONFIG['user'], DATABASE_CONFIG['password']);
                  $query = $db->query("SELECT * FROM categories") or die($db->error);
                  $query->execute();
                  return $query->fetchAll();
            }

           ?>
            
                <div Class="row justify-content-center">

            <table Class="table">
            <thead>
                <tr>
                    <th> id </th>
                    <th> titre </th>
                    <th> contenu </th>
                    <th > Img </th>
                    <th> </th>
                    <th > categorie</th>
                    <th colspan="3"> Action</th>
                </tr>   
        </thead>
            <?php
            $articles = getArticle();
            foreach ($articles as $posts): ?>
                <tr>
                    <td> <?php echo $posts['id']; ?></td>
                    <td> <?php echo $posts['title']; ?></td>
                    <td> <?php echo $posts['content']; ?></td> 
                    <td> <img src=.<?php echo($posts['imagePath'])?> id="imageAdmin" style="max-width:50px; max-height:50px; align:left" alt="pas dimage"> </td>
                    <td> </td> 
                    <td style="text-align:center"> <?php echo $posts['idCategory']; ?> </td> 

                    <td>
                        <a href="../controller/maj.php?edit=<?php echo $posts['id'];?>"
                            class="btn btn-info">Editer</a>

                        <a href="../controller/crudRepository?delete=<?php echo $posts['id']; ?>"
                            class="btn btn-danger">Supprimer</a> </a>
                    </td>
        </tr>
        <?php endforeach; ?>
        </table>

        </div>
            <?php
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>
        </div>



<div class="row justify-content-center" id="NewArticle">
<form action="indexAuth.php?controle=crudRepository&action=creer_article" method="post" enctype="multipart/form-data">
        
        <div class= "form-group">
                <label>titre</label>
                <input type="text" name="title" class="form-control" placeholder="Entrez le titre">

         </div>  

          <div class= "form-group">
                <label>contenu</label>
                <input type="text" name="content" class="form-control" placeholder="Entrez le contenu">
            </div>

            <div class="input-group mb-3">
            <div class="input-group-append">
    <label class="input-group-text" for="inputGroupSelect02">Categorie</label>
  </div>
           <?php $categories = getCategorie();?>
                   
                <select name="selectCat" class="custom-select" id="inputGroupSelect02">
                <?php foreach ($categories as $categories): ?>
                <option value="<?php echo $categories['id']; ?>"> <?php echo $categories['name']; ?> </option> 
                                 <?php endforeach ?>  </select> <p> OU </P><a  href="categorie/accueil.php"><button type="button" class="btn btn-outline-secondary">Créer Categorie</button></a>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Envoyer</span>
  </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="photo" type="submit">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
            </div>

            <div class ="form-group">
			    <button type= "submit" class="btn btn-primary" name="save">sauvegarder</button>
            </div>

		 </h3></div>
		</fieldset>
			</div>
            </form>
</div>

      </body>
</html>