<?php
	/**
	 * classe per cambiare email ad un utente
	 */
	class ChangeEmailClass
	{
		private $oldEmail;
		private $newEmail;
        private $confEmail;
        private $confPass;
        private $hashedPass;


        /**
		 * Costruttore, tutti i parametri non devono essere vuoti 
		 * 
		 * @param String $oldEmail -> vecchia email utente
		 * @param String $newEmail -> nuova email utente
		 * @param String $confEmail -> conferma email utente
		 * @param String $confPass -> conferma password
		 */
		public function __construct($oldEmail, $newEmail, $confEmail, $confPass)
		{
            if(!empty($oldEmail) && !empty($newEmail) && !empty($confEmail) && !empty($confPass)){
                $this->oldEmail = $oldEmail;
                $this->newEmail = $newEmail;
                $this->confEmail = $confEmail; 
                $this->confPass = $confPass; 
            }else{
                throw new Exception("Completare tutti i campi");
            }
		}

        /**
		 * Controlla se le 2 nuove email sono uguali
		 */
		public function equals(){
			if($this->newEmail == $this->confEmail){
                return true;
            }
            return false;
		}

        /**
		 * Torna l'hash della password con salt l'email
         * 
         * @param String $email -> email da utilizzare come salt
		 */
        public function getHashedPass($email){
			require_once 'application/libs/hash.php';
			$hashUser = new Hash($this->confPass);
			$hashUser->doHash($email);
			return $hashUser->getHashed();
		}

		function changeEmail(){
			require 'application/libs/connection.php';
            require 'application/libs/Register/email.php';
            if($this->equals()){
                $emailUser = new Email($this->newEmail);
                if($emailUser->isValid()){
                    $oldHashedPass = $this->getHashedPass($this->oldEmail);
                    $sql = "SELECT * FROM utente WHERE email='$this->oldEmail' && password='$oldHashedPass'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $this->hashedPass = $this->getHashedPass($this->newEmail);
                        $sql = "UPDATE utente SET email='$this->newEmail', password='$this->hashedPass' WHERE email='$this->oldEmail' AND is_enable=1";
                        $conn->query($sql);
                        if(mysqli_affected_rows($conn) > 0 ){
                            return TRUE;
                        }
                        throw new Exception("La nuova email deve essere diversa dalla vecchia");
                    }else{
                        throw new Exception("Email o password errata");
                    }
                }else{
                    throw new Exception("Nuova email non valida");
                }
            }else{
                throw new Exception("Le due email non coincidono");
            }       
		}
	}
?>
