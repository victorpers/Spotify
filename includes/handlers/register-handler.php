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