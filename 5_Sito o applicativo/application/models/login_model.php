<?php
	/**
	 * classe per il login
	 */
	class LoginClass
	{
		private $email;
		private $password;
        private $hashedPassword;

		function __construct($email, $password)
		{
			$this->email = $email;
			$this->password = $password; 
		}

		function getHashedPass(){
			require 'application/libs/hash.php';
			$hashUser = new Hash($this->password);
			$hashUser->doHash($this->email);
			$this->hashedPassword = $hashUser->getHashed();
		}

		function doLogin(){
			require 'application/libs/connection.php';
            $this->getHashedPass();
            $sql = "SELECT * FROM utente WHERE email='$this->email' && password='$this->hashedPassword'";
            $result = $conn->query($sql);
			$row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
				if($row['is_enable'] == 1){
					$_SESSION['id'] = $row['id'];
					$_SESSION['isAdmin'] = $row['is_admin'];
					return true;
				}
				session_destroy();
                throw new Exception("Utente disabilitato");
            }else{ 
				session_destroy();
                throw new Exception("Email o password non valida");
            }                
		}
	}
?>
