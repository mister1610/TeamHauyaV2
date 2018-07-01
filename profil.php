<?php
session_start();
include ('config.php');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
	<title>Team Haurya | Profil</title>
</head>
<body>
	<div id="corps"><br>
		<h1>Profil de <?= $userinfo['pseudo']; ?></h1>

		<?php
		if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
		?>
		<a href="#">Edition du profil</a>
		<a href="deconnexion">Se déconnecter</a>
		<?php
		}
		?>
	</div>
</body>
</html>
<?php
} else {
	//header("Location: ../connexion.php");
}