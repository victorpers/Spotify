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

function validateUsername($un) {
	//Check if username is valid
}

function validateFirstName($fn) {
	//Check if first name is valid
}

function validateLastName($ln) {
	//Check if last name is valid
}

function validateEmails($em, $em2) {
	//Check if emails is valid
}

function validatePasswords($pw, $pw2) {
	//Check if passwords is valid
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

	validateUsername($username);
	validateFirstName($firstName);
	validateLastName($lastNames);
	validateEmails($email, $email2);
	validatePasswords($password, $password2);
}

?>