<?php
	/**
	 * classe per rimuovere un utente
	 */
	class DeleteUserClass
	{
		private $email;
		private $confEmail;

		public function __construct($email, $confEmail)
		{
            if(!empty($email) && !empty($confEmail)){
                $this->email = $email;
                $this->confEmail = $confEmail; 
            }else{
                throw new Exception("Completare tutti i campi");
            }
		}

		public function equals(){
			if($this->email == $this->confEmail){
                return true;
            }
            return false;
		}

		function deleteUser(){
			require 'application/libs/connection.php';
            if($this->equals()){
                $sql = "SELECT * FROM utente WHERE email='$this->email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $sql = "UPDATE utente SET is_enable = FALSE WHERE email='$this->email' AND is_enable=1";
                    $conn->query($sql);
                    if(mysqli_affected_rows($conn) > 0 ){
                        return TRUE;
                    }
                    throw new Exception("Utente non trovato");
                }else{ 
                    throw new Exception("Utente non esistente");
                }
            }else{
                throw new Exception("Le due email non coincidono");
            }                
		}
	}
?>
