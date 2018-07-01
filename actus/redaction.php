<?php
require_once('../config.php');

include ('edition.php');

if(isset($_POST['publication_titre'], $_POST['publication_contenu'])) {
	if(!empty($_POST['publication_titre']) AND !empty($_POST['publication_contenu'])) {
		$publication_titre = htmlspecialchars($_POST['publication_titre']);
		$publication_contenu = htmlspecialchars($_POST['publication_contenu']);
		if($mode_edition == 0){

			//var_dump($_FILES);
			//var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));

			$ins = $bdd->prepare('INSERT INTO articls (titre, contenu ,date_time_post) VALUES (?, ?, NOW())'); // insertion des donnée dans la base de données
			$ins->execute(array($publication_titre, $publication_contenu)); // execute l'insetion dans la base de données
			$lastid = $bdd->lastInsertId();

			if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
				if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2 ) {
					$chemin = 'miniatures/'.$lastid.'.jpg';
					move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
				} else {
					$error = 'L\'image doit être au format jpg ';
				}
			}

			$error = "Votre publication à bien été posté";
		} else {
			$update = $bdd->prepare('UPDATE articls SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
			$update->execute(array($publication_titre, $publication_contenu, $edit_id));
			header('Location: http://127.0.0.1/teamhaurya.fr/site/actus/affichage.php?id='.$edit_id);
			$error = "Votre publication à bien été mis à jour";
		}
	} else {
		$error= "Veuillez remplir tous les champs";
	}
}

?>
<div class="redaction">
	<br>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" placeholder="titre" name="publication_titre" <?php if($mode_edition == 1) { ?> value="<?= $edit_publication['titre'] ?>" <?php } ?>><br>
		<textarea placeholder="contenu de la publication" name="publication_contenu"><?php if($mode_edition == 1) { ?> <?= $edit_publication['contenu'] ?> <?php } ?></textarea><br>
		<?php if($mode_edition == 0) { ?>
		<input type="file" name="miniature">
		<?php } ?> <br>
		<input type="submit" value="Publié">
	</form>
	<br>
	<?php if(isset($error)) {
		echo $error;
	}
	?>
</div>