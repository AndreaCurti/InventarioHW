<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require("../Models/connection.php");
		require("../Models/hash.php");
		$hashUser = new Hash($_POST["password"]);
		$email = $_POST["email"];
		$hashUser->doHash($email);
		$hashedPass = $hashUser->getHashed();
		echo $hashedPass;
		$sql = "SELECT * FROM utente WHERE email='$email' && password='$hashedPass'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "Sei loggato";
		}else{ 
			require("../Views/login.php"); ?>
			<script>
				document.getElementById("errorLogin").innerHTML = "Email o password non valida";
			</script>
		<?php }
	}else{ 
		require("../Views/login.php");
	}
?>
</body>