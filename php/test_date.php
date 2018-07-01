<?php 
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=teamhaurya;charset=utf8','phpmyadmin','Sandrine76&&**');
	setlocale(LC_TIME, 'fr_FR');

	$videos = $bdd->query('SELECT * FROM videos ORDER BY date_time_post DESC LIMIT 0,10');

		$date = $bdd->query('SELECT date_time_post FROM videos ORDER BY date_time_post DESC');
		$date = $date->fetch()['date_time_post'];

	
?>


		<?php while ($v = $videos->fetch()) { ?>
			publié le : <?php echo strftime("%A %d %B %Y", strtotime($v['date_time_post'])); ?> <br>
		<?php } ?>