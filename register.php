<?php

function santitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function santitizeFormEmail($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function santitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function santitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}
	
if (isset($_POST['registerButton'])) {
	//Register button was pressed
	$username = santitizeFormUsername($_POST['username']);

	$email = santitizeFormEmail($_POST['email']);
	$email2 = santitizeFormEmail($_POST['email2']);

	$firstName = santitizeFormString($_POST['firstName']);
	$lastName = santitizeFormString($_POST['lastName']);

	$password = santitizeFormPassword($_POST['password']);
	$password2 = santitizeFormPassword($_POST['password2']);
}

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
				<label for="username">Pseudo</label>
				<input id="username" name="username" type="text" placeholder="bartSimpson" required>
			</p>
			<p>
				<label for="firstName">Prénom</label>
				<input id="firstName" name="firstName" type="text" placeholder="Bart" required>
			</p>
			<p>
				<label for="lastName">Nom</label>
				<input id="lastName" name="lastName" type="text" placeholder="Simpson" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="bart@gmail.com" required>
			</p>
			<p>
				<label for="email2">Confirmer email</label>
				<input id="email2" name="email2" type="email" placeholder="bart@gmail.com" required>
			</p>
			<p>
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