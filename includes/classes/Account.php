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
			//Check if first name is valid
		}

		private function validateLastName($ln) {
			//Check if last name is valid
		}

		private function validateEmails($em, $em2) {
			//Check if emails is valid
		}

		private function validatePasswords($pw, $pw2) {
			//Check if passwords is valid
		}
	}
?>