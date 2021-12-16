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

		public function equals(){
			if($this->newEmail == $this->confEmail){
                return true;
            }
            return false;
		}

        public function getHashedPass($email){
			require_once 'application/libs/hash.php';
			$hashUser = new Hash($this->confPass);
			$hashUser->doHash($email);
			return $hashUser->getHashed();
		}

		function changeEmail(){
			require 'application/libs/connection.php';
            if($this->equals()){
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
                    throw new Exception("Utente non trovato");
                }else{
                    throw new Exception("Email o password errata");
                }
            }else{
                throw new Exception("Le due email non coincidono");
            }       
		}
	}
?>
