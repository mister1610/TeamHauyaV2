<?php 
	include ('../config.php');
	setlocale(LC_TIME, 'fr');

	$videos = $bdd->query('SELECT * FROM videos ORDER BY date_time_post DESC LIMIT 0,10');
	$date = $bdd->query('SELECT date_time_post FROM videos ORDER BY date_time_post DESC');
	$date = $date->fetch()['date_time_post'];
?>

<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>Team Haurya | Vidéos</title>
        <br>
        <description><h1>Les vidéos de notre chaîne youtube</h1></description>
		<br>
        <link><h3>Vous pouvez aller visiter <a href="https://www.youtube.com/channel/UCcrc1kiMw9EIl9oC_hG7cqQ" target="_blank">notre chaîne Youtube</a></h3></link>
		<br>
        <?php while ($v = $videos->fetch()) { ?>
	        <item>
	            <title><?= $v['titre'] ?></title>
				<br>
	            <description><?= $v['contenu'] ?></description>
				<br><br>
	            <pubDate>Publié le : <?= strftime("%A %d %B %Y", strtotime($v['date_time_post'])); ?></pubDate>
				<br><br>
	            <!--<link><iframe width="560" height="315" src="<?= $v['lien']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></link>-->
	            <br>
	        </item>
	    <?php } ?>
    </channel>
</rss>