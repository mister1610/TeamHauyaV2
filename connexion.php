<?php 
session_start();
include ("membre/connexion.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Team Haurya | Connexion</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include ("banniere/banniere.inc.html"); ?>
	<?php include ("menu/menu.inc.html"); ?>
	<div id="corps"><br>
		<h1 class="connexion">Connexion</h1>
		<br><br>
		<form method="POST" action="">
			<table style="margin-left: 40%">
				<tr>
					<td>
						<label for="pseudoconnect">Pseudo :</label>
					</td>
					<td>
						<input type="text" name="pseudoconnect" placeholder="Pseudo">
					</td>
				</tr>
				<tr>
					<td>
						<label for="mdpconnect">Mot de passe :</label>
					</td>
					<td>
						<input type="password" name="mdpconnect" placeholder="Mot de passe">
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="center">
						<input type="submit" name="validationconnect" value="Connexion" sty>
					</td>
				</tr>
			</table>
			<div class="error"><br>
				<?php
					if(isset($error)) {
						echo '<font color="red">'.$error."</font>";
					}
				?>
			</div>
		</form>
	</div>
</body>
</html>