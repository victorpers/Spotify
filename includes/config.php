<?php

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Europe/Paris");

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=spotify;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

?>