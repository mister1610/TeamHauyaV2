<?php
require_once('../config.php');

$mode_edition = 0;

if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
	$mode_edition = 1;
	$edit_id = htmlspecialchars($_GET['edit']);
	$edit_publication = $bdd->prepare('SELECT * FROM articls WHERE id = ?');
	$edit_publication->execute(array($edit_id));

	if($edit_publication->rowCount() == 1) { // vérifie si la publication existe ou pas
		$edit_publication = $edit_publication->fetch();
		
	} else {
		die('Error : la publication concerné n\'existe pas');
	}
}
?>