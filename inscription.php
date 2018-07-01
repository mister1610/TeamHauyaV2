<?php 
include ("membre/inscription.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Team Haurya | Inscription</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include ("banniere/banniere.inc.html"); ?>
	<?php include ("menu/menu.inc.html"); ?>
	<div id="corps" style="width: 1218px"><br>
		<h1 class="inscription">Inscription</h1>
		<br><br>
		<form method="POST" action="">
			<table class="inscription">
				<tr>
					<td class="Inscription">
						<label for="pseudo">Pseudo :</label>
					</td>
					<td>
						<input type="text" name="pseudo" placeholder="Votre pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" class="inscription">
					</td>
				</tr>
				<tr>
					<td class="Inscription">
						<label for="mail">Adresse mail :</label>
					</td>
					<td>
						<input type="email" name="mail" placeholder="Votre adresse mail" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" class="inscription">
					</td>
				</tr>
				<tr>
					<td class="Inscription">
						<label for="mail2">Confirmation de votre adresse mail :</label>
					</td>
					<td>
						<input type="email" name="mail2" placeholder="Confirmation de votre adresse mail" id="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" class="inscription">
					</td>
				</tr>
				<tr>
					<td class="Inscription">
						<label for="mdp">Votre mot de passe :</label>
					</td>
					<td>
						<input type="password" name="mdp" placeholder="Votre mot de passe" id="mdp" class="inscription">
					</td>
				</tr>
				<tr>
					<td class="Inscription">
						<label for="mdp2">Confirmation de votre mot de passe :</label>
					</td>
					<td>
						<input type="password" name="mdp2" placeholder="Confirmation de votre mot de passe" id="mdp2" class="inscription">
					</td>
				</tr>
				<tr>
					<td></td>
					<td align="center">
						<input type="submit" name="validation" value="Valider !">
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