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

	$firstName = santitizeFormString($_POST['firstName']);
	$lastName = santitizeFormString($_POST['lastName']);

	$email = santitizeFormEmail($_POST['email']);
	$email2 = santitizeFormEmail($_POST['email2']);

	$password = santitizeFormPassword($_POST['password']);
	$password2 = santitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

	if ($wasSuccessful) {
		header("Location: index.php");
	}
}

?>