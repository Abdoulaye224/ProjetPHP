<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" type="text/css" href="./css/style1.css" />
    </head>
<body>
<?php
        require __DIR__ . '/../model/authRepository.php';

session_start(); 

function ident () {
		$username=isset($_POST['username'])?trim($_POST['username']):'';
		$password=isset($_POST['password'])?trim($_POST['password']):'';
		
		$msg ="";
		$_SESSION['username']=$username;

			if (count($_POST)==0){
				require("../view/auth.html");
            }
		else {
			$profil= array();
			if ($bool=verifS_ident($username, $password, $err) && verif_bd($username, $password, $profil)) {
				$_SESSION['profil'] = $profil;	
				$nexturl = "indexAuth.php?controle=authController&action=accueil";
				header ("Location:" . $nexturl);
			}
			else {
				if (!$bool) $msg = $err; 
				else $msg = "Utilisateur inconnu !";
				echo $msg;
				require("../view/auth.html");
			}
			
}
}
session_destroy();
function accueil () {
	require("../view/accueilAdmin.php");
}

function verifS_ident($username, $password, &$err) {
	if (!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $username)) {
		$err = 'erreur de syntaxe sur le nom dutilisateur';
		return false;
	}
	if (!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $password)) {
		$err = 'erreur de syntaxe sur le mot de pass';
		return false;
	}
	return true;
}  ?>
</body>
</html>

	
