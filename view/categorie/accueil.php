<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
        <div id="entete" style="margin-bottom:100px">
        <?php require("entete.php"); ?>
        </div>


<div id="bjrAdmin" style="margin-bottom:50px">
<a class="btn btn-info" style="" href="../accueilAdmin.php"><span class="fa fa-backward"></span> Gestion des articles</a>

        <?php require ("../../config/config.php"); ?>
        <?php require ("../../controller/crudRepository.php"); ?>
    
        <?php
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
                
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?> </div> 
                <?php endif ?>
    <div class="container">

    <?php
            function getCategorie () {
            $db = new PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=utf8', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),DATABASE_CONFIG['user'], DATABASE_CONFIG['password']);
              $query = $db->query("SELECT * FROM categories") or die($db->error);
              $query->execute();
              return $query->fetchAll();
            }
?>

<div id="tableaux" style="display:flex; width:100%">

    <div Class="row justify-content-left" style="width:60%">

            <table Class="table table-bordered" style="margin-top:50px; width:100%">
            <thead>
                <tr>
                    <th> id </th>
                    <th > NOM</th>
                    <th colspan="3"> Action</th>
                </tr>   
            </thead>
            <?php
            $categorie = getCategorie();
            foreach ($categorie as $categories): ?>
                <tr>
                    <td> <?php echo $categories['id']; ?></td>
                    <td> <?php echo $categories['name']; ?></td>                    
                    <td>
                        <a href="maj.php?edit=<?php echo $categories['id'];?>"
                            class="btn btn-info">Editer</a>

                        <a href="../../controller/crudRepository?deleteCat=<?php echo $categories['id']; ?>"
                            class="btn btn-danger">Supprimer</a> </a>
                    </td>
            </tr>
            <?php endforeach; ?>
            </table>

</div>
                    <div Class="row justify-content-right" style="width:40%; margin-left:50px" >

                    <table Class="table table-bordered" style="margin-top:300px; width:100%">
                    <thead>
                <tr>
                    <th> Créer une nouvelle Categorie </th>
                </tr>   
            </thead>
            <tr>
                    <td>

                    <div class="row justify-content-center">
                    <form action="../indexAuth.php?controle=crudRepository&action=creer_categorie" method="post" enctype="">
        
        <div class= "form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" 
                 placeholder="Entrez le nom">

         </div>  
            <div class ="form-group">
			    <button type= "submit" class="btn btn-primary" name="saveCat">sauvegarder</button>
            </div>

		 </h3></div>
		</fieldset>
			</div>
            </form>
                    </td>
            </tr>


                    </table>

                    </div>









    </div>

</body>
</html>