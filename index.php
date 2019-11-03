<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet">
<link  rel="stylesheet" type="text/css" href="css/style1.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
        <?php session_start(); ?>

            <?php require("view/entete.php"); ?>

          <?php  if(isset($_SESSION['username']))  { ?>
            <div id="bye" style="margin-bottom:-70px; margin-top:60px; text-align:center">
          <P>Vous avez bien été déconnecté. à très bientôt : <span style="color:blue"> <?php echo($_SESSION['username']);?></span>
            </div>
          <?php } session_destroy() ?>

          <p style="margin-top:100px; text-align:center; 	border-bottom:3px black solid; border-top:3px black solid;"> Cliquez sur les articles pour voir les détails </P>
       <table width="100%">

            <tr>
                <td width="18%" >
                    <div class="p-3 mb-2 bg-light text-dark" id="articles" style="margin-top:100px">
                    <?php require_once(__DIR__ . '/controller/articlesController.php'); ?>
                    </div>
                </td>

                <td>
                    <div id="détails"  style="margin-top:-50px; heigth:700px">
                    <?php  if(isset($_GET['idCat'])){
                            require_once(__DIR__ . '/controller/categoriesController.php'); 
                            require_once(__DIR__ . '/controller/usersController.php');
                            require_once(__DIR__ . '/view/membres/public/aricleContent.php');
                            require_once(__DIR__ . '/controller/commentsController.php'); 

                            }?>
                    </div>
                </td>
                </tr>
                  
                <tr>
                <td width="20%">
                <?php if(isset($_GET['idCat'])){?>
                <?php foreach ($articleImg as $posts): ?>
                     
                <img src=<?php echo($posts['imagePath'])?> style="max-width:50%; max-height:50%; float:right">
                         
                      
                      <?php endforeach;
                       } ?>
                     
                   </td>
                    </tr>
                
         

         </table>

                                
        </body>
</html>
        

