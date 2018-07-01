<?php
require_once('../config.php');

	if(isset($_GET['id']) AND !empty($_GET['id'])) {
		$get_id = htmlspecialchars($_GET['id']);

		$publication = $bdd->prepare('SELECT * FROM articls WHERE id = ?');
		$publication-> execute(array($_GET['id']));

		if($publication->rowCount() == 1) {
			$publication = $publication->fetch();
			$id = $publication['id'];
			$titre = $publication['titre'];
			$contenu = $publication['contenu'];
		} else {
			die('Cette publication n\'existe pas' );
		}
	} else {
		die('Error');
	}
?>
<div class="affichage_publication">
	<img src="actus/miniatures/<?= $id ?>.jpg" width="100">
	<h1><?= $titre ?></h1>
	<p><?= $contenu ?></p>
</div>