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

function verif_bd($username,$password,&$profil) 
{
    $username=isset($_POST['username'])?trim($_POST['username']):'';
    
    $password=isset($_POST['password'])?trim($_POST['password']):'';
    $db = connect();

    $sql="SELECT * FROM `users` WHERE username=:username AND password=:password";
    
    try {
        $commande = $db->prepare($sql);
        $commande->bindParam(':username', $username);
        $commande->bindParam(':password', $password);
        $bool = $commande->execute();
        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
             $_SESSION['ConnectedUser'] = $resultat; //die();
            
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die();
    }
    try {
        if (count($resultat) == 0) {
            $profil=array(); 
            return false; 
        }
        else {
            $profil = $resultat[0];
            return true;
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); 
    }
    
}
?>