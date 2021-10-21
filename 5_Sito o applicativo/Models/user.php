<?php
	/**
	 * classe per lo user
	 */
	class User
	{
		private $name;
		private $surname;
		private $email;
		private $password;
		private $confPassword;
		private $hashedPassword;
		private $isAdmin;

		function __construct($name, $surname, $email, $password, $confPass, $isAdmin)
		{
			$this->name = $name;
			$this->surname = $surname; 
			$this->email = $email;
			$this->password = $password; 
			$this->confPass = $confPass;
			$this->isAdmin = $isAdmin;
		}

		function getHashedPass(){
			require('hash.php');
			$hashUser = new Hash($this->password);
			$hashUser->doHash($this->email);
			$this->hashedPassword = $hashUser->getHashed();
		}

		function createUser(){
			require('connection.php');
			require('email.php');
			require('password.php');
			$emailUser = new Email($this->email);
			if($emailUser->isValid()){
				$passUser = new Password($this->password);
				if($passUser->isValid()){
					if($this->password == $this->confPass){
						User::getHashedPass();
						$sql = "SELECT * FROM utente WHERE email='$this->email'";
						$result = $conn->query($sql);
						if ($result->num_rows == 0) {
							$sql = "INSERT INTO utente(nome, cognome, email, password, is_admin) VALUES('$this->name','$this->surname','$this->email', '$this->hashedPassword', $this->isAdmin)";
							$conn->query($sql);
						}else{
							throw new Exception("Utente già esistente");
						}
					}else{
						throw new Exception("Le password non corrispondono");
					}
				}else{
					throw new Exception("La password deve contenere almeno:<br>- 8 Caratteri<br>-1 Maiuscola<br>-1 Minuscola<br>-1 Cifra<br>-1 Carattere speciale");
				}
			}else{
				throw new Exception("Email invalida");
			}
		}
	}
?>
