<?php
	class Account {

		private $errorArray;

		public function __construct() {
			$this->errorArray = array();
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);
		}

		private function validateUsername($un) {
			if (strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, "Ton pseudo doit contenir entre 5 et 25 caractères");
				return;
			}
			//TODO: check if username exists
		}

		private function validateFirstName($fn) {
			if (strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, "Ton nom doit contenir entre 2 et 25 caractères");
				return;
			}
		}

		private function validateLastName($ln) {
			if (strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, "Ton prénom doit contenir entre 2 et 25 caractères");
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, "Les emails ne correspondent pas");
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, "Email invalide");
				return;
			}
			//TODO: check if email hasn't already been used
		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2) {
				array_push($this->errorArray, "Les mots de passes ne correspondent pas");
				return;
			}

			if (preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, "Votre mot de passe ne peut contenir que des chiffres et des lettres");
				return;
			}

			if (strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, "Votre mot de passe doit contenir entre 5 et 30 caractères");
				return;
			}
		}
	}
?>