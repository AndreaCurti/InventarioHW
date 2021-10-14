<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "prova";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}else{
		echo "Funziona <br>";
	}

	// Query da fare al DB
	$sql = "SELECT * FROM utente";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
  			// Trova tutte le colonne
  			foreach($row as $key => $value) {
  				//echo $key. " ";
			}

			// Criptare password in sha256
			$hash = hash('sha256', $row['password']);
			$salt = $row['nome'];
			$password = hash('sha256', $salt . $hash);
			echo $password . "<br>";

			// Stampa Nome e Cognome
    		//echo "Nome: " . $row["nome"]. "  -  Cognome: " . $row["cognome"] . "<br>";
  		}
	} else {
  		echo "0 results";
	}

	$hash = hash('sha256', "ciao1234");
	$salt = "Andrea";
	$password = hash('sha256', $salt . $hash);
	echo $password;
	/*$hash = hash('sha256', $password1);
	$salt = createSalt();
	$password = hash('sha256', $salt . $hash);*/
?>

<?php
/*$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();*/
?>