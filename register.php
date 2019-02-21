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
				<input id="loginPassword" name="loginPassword" type="text" required>
			</p>

			<button type="submit" name="loginButton">Connexion</button>

		</form>
	</div>
	
</body>
</html>