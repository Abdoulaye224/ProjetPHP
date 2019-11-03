
<!doctype html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
            <?php $connecté = false; ?>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="btn btn-outline-success" name="deconnexion" style="color:black" href="../../index.php">ACCUEIL</a></li>
                </ul><ul class="navbar-nav ml-auto">
                

  </div>
</nav>

                        <main role="main" class="container">

                        <div class="starter-template" style="margin-top:100px; text-align:center">
                            <h1>I N S C R I P T I ON</h1>
                        </div>

                        </main>
<div class="container">
<?php

require_once ("../../config/config.php");
function Inscriptionconnect ()
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
$db=Inscriptionconnect();


    if(!empty($_POST)){


    $errors = array();
    
    if(empty($_POST['username']) || !preg_match('/^[a-z0-9A-Z]+$/', $_POST['username'])){
        $errors['username'] ="vous n'avez pas rensreigné votre nom d'utilisateur";

    } else {
        $sql=$db->prepare('SELECT id FROM users WHERE username= ?');
        $sql->execute([$_POST['username']]);

        $users = $sql->fetch();
        if($users){
            $errors['username']= 'ce nom est déja pris';
        }
    
    }  

if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'] ){ 
    $errors['password'] = "Vous devez rentrer un mot de passe valide"; 
}


    if(empty($errors)){
    $sql=$db->prepare("INSERT INTO users SET username= ?, password= ? ");

    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

    $sql->execute([$_POST['username'], $_POST['password']]);
    die('Votre compte a bien été crée');
   header('Location: ../../index.php');
   exit();
   
}


} 


function debug($message){
    echo '<pre>'. print_r($message, true) . '</pre>';
}
?>
    <?php  if(!empty($errors)): ?>
      <div class="alert alert-danger">

        <p> vous n'avez pas rempli le formulaire correctement </p>

        <ul>
                    <?php  foreach($errors as $errors): ?>

                    <li><?= $errors; ?></li>
                <?php endforeach; ?>
    </ul>
    </div>
    <?php endif; ?>

    <form action="" method="post">
                            <div class="form-group">
                                <label for="">username</label>
                                <input type="text" name="username" class="form-control"/>
                         </div>

                         <div class="form-group">
                                <label for="">Mot de pass</label>
                                <input type="password" name="password" class="form-control"/>
                         </div>

                        
                         <div class="form-group">
                                <label for="">Confirmation du mot de pass</label>
                                <input type="password" name="password_confirm" class="form-control"/>
                         </div>

                         <button type= "submit" class="btn btn-primary">S'INSCRIRE</button>
</form>

    </div>
    </body>
 </html>