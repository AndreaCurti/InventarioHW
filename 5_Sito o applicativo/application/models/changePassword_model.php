<?php
	/**
	 * classe per cambiare email ad un utente
	 */
	class ChangePasswordClass
	{
		private $email;
        private $oldPass;
        private $newPass;
        private $confPass;

        private $newHashedPass;

		public function __construct($email, $oldPass, $newPass, $confPass)
		{
            if(!empty($email) && !empty($oldPass) && !empty($newPass) && !empty($confPass)){
                $this->email = $email;
                $this->oldPass = $oldPass;
                $this->newPass = $newPass; 
                $this->confPass = $confPass; 
            }else{
                throw new Exception("Completare tutti i campi");
            }
		}

		public function equals(){
			if($this->newPass == $this->confPass){
                return true;
            }
            return false;
		}

        public function getHashedPass($email, $pass){
			require_once 'application/libs/hash.php';
			$hashUser = new Hash($pass);
			$hashUser->doHash($email);
			return $hashUser->getHashed();
		}

		function changePassword(){
			require 'application/libs/connection.php';
            if($this->equals()){
                $oldHashedPass = $this->getHashedPass($this->email, $this->oldPass);
                $sql = "SELECT * FROM utente WHERE email='$this->email' && password='$oldHashedPass'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $this->newHashedPass = $this->getHashedPass($this->email, $this->newPass);
                    $sql = "UPDATE utente SET password='$this->newHashedPass' WHERE email='$this->email'";
                    $conn->query($sql);
                    echo "utente modificato";
                }else{
                    throw new Exception("Email o password errata");
                }
            }else{
                throw new Exception("Le due password non coincidono");
            }       
		}
	}
?>
