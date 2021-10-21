<?php
	/**
	 * classe per il controllo della password
	 */
	class Password
	{
		private $password;

		function __construct($password)
		{
			$this->password = $password; 
		}

		function isValid(){
			$pass = $this->password;
			$uppercase = preg_match('@[A-Z]@', $pass);
			$lowercase = preg_match('@[a-z]@', $pass);
			$number = preg_match('@[0-9]@', $pass);
			$specialChars = preg_match('@[^\w]@', $pass);
			if(!$uppercase || !$lowercase || !$number 
				|| !$specialChars || strlen($pass) < 8) {
					return false;
			}
			return true;
		}
	}
	/*
	^: anchored to beginning of string
	\S*: any set of characters
	(?=\S{8,}): of at least length 8
	(?=\S*[a-z]): containing at least one lowercase letter
	(?=\S*[A-Z]): and at least one uppercase letter
	(?=\S*[\d]): and at least one number
	$: anchored to the end of the string */
?>

