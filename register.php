<?php
	include("includes/classes/Account.php");

	$account = new Account();
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Spotify</title>
	<meta charset="utf-8">
</head>
<body>
	
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Se connecter à son compte</h2>
			<p>
				<label for="loginUsername">Pseudo</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Mot de passe</label>
				<input id="loginPassword" name="loginPassword" type="text" placeholder="Votre mot de passe" required>
			</p>

			<button type="submit" name="loginButton">Connexion</button>

		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Créer ton compte gratuitement</h2>
			<p>
				<?php echo $account->getError("Ton pseudo doit contenir entre 5 et 25 caractères"); ?>
				<label for="username">Pseudo</label>
				<input id="username" name="username" type="text" placeholder="bartSimpson" required>
			</p>
			<p>
				<?php echo $account->getError("Ton nom doit contenir entre 2 et 25 caractères"); ?>
				<label for="firstName">Prénom</label>
				<input id="firstName" name="firstName" type="text" placeholder="Bart" required>
			</p>
			<p>
				<?php echo $account->getError("Ton prénom doit contenir entre 2 et 25 caractères"); ?>
				<label for="lastName">Nom</label>
				<input id="lastName" name="lastName" type="text" placeholder="Simpson" required>
			</p>
			<p>
				<?php echo $account->getError("Les emails ne correspondent pas"); ?>
				<?php echo $account->getError("Email invalide"); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="bart@gmail.com" required>
			</p>
			<p>
				<label for="email2">Confirmer email</label>
				<input id="email2" name="email2" type="email" placeholder="bart@gmail.com" required>
			</p>
			<p>
				<?php echo $account->getError("Les mots de passes ne correspondent pas"); ?>
				<?php echo $account->getError("Votre mot de passe ne peut contenir que des chiffres et des lettres"); ?>
				<?php echo $account->getError("Votre mot de passe doit contenir entre 5 et 30 caractères"); ?>
				<label for="password">Mot de passe</label>
				<input id="password" name="password" type="password" placeholder="Votre mot de passe" required>
			</p>
			<p>
				<label for="password2">Confirmer mot de passe</label>
				<input id="password2" name="password2" type="password" placeholder="Votre mot de passe" required>
			</p>

			<button type="submit" name="registerButton">S'inscrire</button>

		</form>
	</div>

</body>
</html>