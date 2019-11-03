<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet">
<link  rel="stylesheet" type="text/css" href="/css/style1.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<?php

if ((count($_GET)!=0) && !(isset($_GET['controle']) && isset ($_GET['action']))){
	require ('./vue/erreur404.tpl');
	}
	
	else {
		if ((! isset($_SESSION['profil'])) || count($_GET)==0)	{
			$controle = "Utilisateur";   //cas d'une personne non authentifiée
			$action = "auth";
			
		}			//ou d'un appel à index.php sans paramètre
			
		
			if (isset($_GET['controle']) && isset ($_GET['action'])) {
				$controle = $_GET['controle'];   //cas d'un appel à index.php 
				$action =  $_GET['action'];	//avec les 2 paramètres controle et action
			}
		
	
		require ('../controller/' . $controle . '.php');

		$action(); 
	}
?>

</html>
		