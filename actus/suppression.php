<?php
require_once ('../config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
	$supp_id = htmlspecialchars($_GET['id']);

	$supp = $bdd->prepare('DELETE FROM articls WHERE id = ?');
	$supp->execute(array($supp_id));

	header('Location: http://127.0.0.1/teamhaurya.fr/site/newz.php');
}

?>