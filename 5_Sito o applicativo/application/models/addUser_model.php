<?php
	/**
	 * classe per aggiungere un utente
	 */
	class AddUserClass
	{
		private $name;
		private $surname;
		private $email;
		private $password;
		private $confPass;
		private $hashedPassword;
		private $isAdmin;

		/**
		 * Costruttore, tutti i parametri non devono essere vuoti 
		 * 
		 * @param String $name -> nome utente
		 * @param String $surname -> cognome utente
		 * @param String $email -> email utente
		 * @param String $password -> password utente
		 * @param String $confPass -> conferma password
		 * @param Int $isAdmin -> se utente è admin oppure no
		 */
		public function __construct($name, $surname, $email, $password, $confPass, $isAdmin)
		{
			if(!empty($name) && !empty($surname) && !empty($email) 
			  && !empty($password) && !empty($confPass)){
				$this->name = $name;
				$this->surname = $surname; 
				$this->email = $email;
				$this->password = $password; 
				$this->confPass = $confPass;
				$this->isAdmin = $isAdmin;
			}else{
				throw new Exception("Completare correttamente tutti i campi");
			}
		}

		/**
		 * Metodo che calcola l'hash in sha256 della password con salt l'email
		 */
		public function getHashedPass(){
			require 'application/libs/hash.php';
			$hashUser = new Hash($this->password);
			$hashUser->doHash($this->email);
			$this->hashedPassword = $hashUser->getHashed();
		}

		/**
		 * Metodo che crea l'utente, dopo i vari controlli sull'email e password
		 */
		public function createUser(){
			require 'application/libs/connection.php';
			require 'application/libs/Register/email.php';
			require 'application/libs/Register/password.php';
			$emailUser = new Email($this->email);
			if($emailUser->isValid()){
				$passUser = new Password($this->password);
				if($passUser->isValid()){
					if($this->password == $this->confPass){
						$this->getHashedPass();
						$sql = "SELECT * FROM utente WHERE email='$this->email'";
						$result = $conn->query($sql);
						if ($result->num_rows == 0) {
							$sql = "INSERT INTO utente(nome, cognome, email, password, is_admin, is_enable) 
							VALUES('$this->name','$this->surname','$this->email', '$this->hashedPassword', $this->isAdmin, TRUE)";
							$conn->query($sql);
							return TRUE;
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
