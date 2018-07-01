<?php 

include ("config.php");

if(isset($_POST['validationconnect'])) {
	$pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);

	if(!empty($pseudoconnect) AND !empty($mdpconnect)) { //vérifie que les cases ne sont pas vide
		$requser = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?');
		$requser->execute(array($pseudoconnect, $mdpconnect));
		$userexist = $requser->rowCount();

		if($userexist == 1 ) { //vérifie que l'utilisateur existe bien
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: membre/profil.php?pseudo=".$_SESSION['pseudo']);
		} else {
			$error = "Pseudo ou mot de passe incorrect ";
		}
	} else {
		$error = "Tous les champs doivent être complétés ";
	}
}

?>