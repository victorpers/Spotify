<?php
	class Account {

		private $bdd;
		private $errorArray;

		public function __construct($bdd) {
			$this->bdd = $bdd;
			$this->errorArray = array();
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if (empty($this->errorArray)) {
				//Insert into DB
				return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
			}
			else {
				return false;
			}
		}

		public function getError($error) {
			if (!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pw) {
			$encryptedPw = md5($pw); //Password -> dzoak45adza54
			$profilePic = "assets/images/profile-pics/head_emerald.png";
			$date = date("Y-m-d");
			$bdd = $this->bdd;

			$result = $bdd->prepare("INSERT INTO users(username, firstName, lastName, email, password, signUpDate, profilePic) VALUES(:username, :firstName, :lastName, :email, :password, :signUpDate, :profilePic)");
			$result->execute(array(
				'username' => $un,
				'firstName' => $fn,
				'lastName' => $ln,
				'email' => $em,
				'password' => $pw,
				'signUpDate' => $date,
				'profilePic' => $profilePic
			));
			return $result;
		}

		private function validateUsername($un) {
			if (strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}
			$bdd = $this->bdd;
			$checkUsernameQuery = $bdd->prepare("SELECT username FROM users WHERE username = :un");
			$checkUsernameQuery->bindParam(':un', $un);
			$checkUsernameQuery->execute();
			if($checkUsernameQuery->rowCount() != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}
		}

		private function validateFirstName($fn) {
			if (strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln) {
			if (strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}
			$bdd = $this->bdd;
			$checkEmailQuery = $bdd->prepare("SELECT email FROM users WHERE email = :em");
			$checkEmailQuery->bindParam(':em', $em);
			$checkEmailQuery->execute();
			if($checkEmailQuery->rowCount() != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}

			if (preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if (strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
		}
	}
?>