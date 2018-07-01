<?php 
	$publication = $bdd->query('SELECT * FROM articls ORDER BY date_time_post DESC');
?>

<div class="publication">
	<ul>
		<?php while($p = $publication->fetch()) { ?>
			<li>
				<a href="actus/affichage.php?id=<?= $p['id'] ?>">
				<img src="actus/miniatures/<?= $p['id'] ?>.jpg" width="100"> <br><?= $p['titre'] ?></a> | <a href="actus/redaction.php?edit=<?= $p['id'] ?>">Modifier</a> | <a href="actus/suppression.php?id=<?= $p['id'] ?>">Supprimer</a>
			</li>
		<?php } ?>
	</ul>
</div>