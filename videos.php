<?php include ("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Team Haurya | Vidéos</title>
</head>
<body>
	<?php include ("banniere/banniere.inc.html"); ?>
	<?php include ("menu/menu.inc.html"); ?>
	<div id="corps">
		<div class="videos">
			<?php include ("php/flux_rss.php"); ?>
		</div>
	</div>
</body>
</html>