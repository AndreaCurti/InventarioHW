<?php
	require("../Models/user.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		try{
			if(!empty($_POST["nome"]) 
				&& !empty($_POST["cognome"]) 
				&& !empty($_POST["email"]) 
				&& !empty($_POST["password"]) 
				&& !empty($_POST["confPassword"])){
				$user = new User($_POST["nome"], 
					$_POST["cognome"], $_POST["email"], 
					$_POST["password"], $_POST["confPassword"], 
					isset($_POST["isAdmin"]) ? 1 : 0);
				$user->createUser();
			}else{
				throw new Exception("Completare correttamente tutti i campi");
			}
		}catch(Exception $e){
			require("../Views/register.php"); ?>
			<script>
				document.getElementById("errorRegister").innerHTML = "<?php echo $e->getMessage()?>";
			</script>
		<?php }
	}else{ 
		require("../Views/register.php");
	}
?>