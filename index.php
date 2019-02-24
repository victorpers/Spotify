<?php
include("includes/config.php");

//session_destroy(); Log out manually

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue sur Spotify</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="text-align: center;">Spotify</h1>

</body>
</html>