<?php

require_once __DIR__ . '/../config/config.php';
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


function valid_inscription($username,$password) 
{
   // $username=isset($_POST['username'])?trim($_POST['username']):'';
    
   // $password=isset($_POST['password'])?trim($_POST['password']):'';
    $db = Inscriptionconnect();
    $sql=("INSERT INTO users SET username= ?, password= ? ");

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql->excute($_POST['username'], $_POST['password']);

    die('Votre compte a bien été crée');
   
}
