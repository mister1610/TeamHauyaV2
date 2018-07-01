<?php 

include ('config.php');

if(isset($_POST['validation'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
		$pseudolenght = strlen($pseudo);

		if($pseudolenght <= 255) {
			$reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
			$reqpseudo->execute(array($pseudo));
			$pseudoexist = $reqpseudo->rowCount();

			if($pseudoexist == 0 ) {
				if($mail == $mail2) {
					if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
						$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();

						if($mailexist == 0 ){
							if($mdp == $mdp2) {
								//$insmembre = $bdd->prepare("INSERT INTO membres (pseudo, mail, motdepasse) VALUES(?, ?, ?)");
								//$insmembre->execute(array($pseudo, $mail, $mdp));
								$error = "compte crée ";
								$_SESSION['comptecree'] = "Votre à bien été crée ";
								header('Location: profil.php?pseudo='.$_SESSION['pseudo']);
							} else {
								$error = "Vos mots de passes sont différents ";
							}
						} else {
							$error = "Cette adresse mail est déjà utilisée ";
						}
					} else {
						$error = "Entrer une adresse mail valide ";
					}
				} else {
					$error = "Vos adresses mail sont différentes ";
				}
			} else {
				$error = "Ce pseudo est déjà utilisé ";
			}
		} else {
			$error = "Votre pseudo est trop long ";
		}
	} else {
		$error = "Tous les champs doivent être rempli ";
	}
}

?>
