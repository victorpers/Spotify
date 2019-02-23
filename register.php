<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($bdd);
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if (isset($_POST[$name])) {
			echo $_POST[$name];
		}
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
				<?php echo $account->getError(Constants::$loginFailed); ?>
				<label for="loginUsername">Pseudo</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Mot de passe</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Votre mot de passe" required>
			</p>

			<button type="submit" name="loginButton">Connexion</button>

		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Créer ton compte gratuitement</h2>
			<p>
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
				<label for="username">Pseudo</label>
				<input id="username" name="username" type="text" placeholder="bartSimpson" value="<?php getInputValue('username'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<label for="firstName">Prénom</label>
				<input id="firstName" name="firstName" type="text" placeholder="Bart" value="<?php getInputValue('firstName'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<label for="lastName">Nom</label>
				<input id="lastName" name="lastName" type="text" placeholder="Simpson" value="<?php getInputValue('lastName'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<?php echo $account->getError(Constants::$emailTaken); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="bart@gmail.com" value="<?php getInputValue('email'); ?>" required>
			</p>
			<p>
				<label for="email2">Confirmer email</label>
				<input id="email2" name="email2" type="email" placeholder="bart@gmail.com" value="<?php getInputValue('email2'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
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