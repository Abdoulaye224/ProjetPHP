<!doctype html>
<html lang="en">
    <head>
    <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
        <title>posts</title>
    </head>
    <body>
        <!-- <h1>Liste des articles</h1> -->
        <ul>
         
            <?php foreach ($articles as $posts): ?>

            <a href="index.php?idCat=<?php echo($posts['idCategory'])?>">

               <div id="article"><button type="button" class="btn btn-outline-secondary btn-lg"><?=($posts['title']) ?></button></div>
               
             <?php endforeach; ?>

            </a>
        </ul>
    </body>
</html>
