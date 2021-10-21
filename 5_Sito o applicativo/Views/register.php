<head>
	<title>Register</title>

	<!-- come titolo usare il nome del file-->
	<!-- quale browser uso?-->
	<!-- quale sistema operativo usato?-->
	<!-- data creazipone: 17.11.2020 ; data ultima modifica: 17.11.2020-->

	<meta charset="UTF-8">
  	<meta name="description" content="Gestione inventario hardware CPT Trevano">
  	<meta name="keywords" content="HTML,CSS,XML,JavaScript, InventarioHW">
  	<meta name="author" content="Andrea Curti I3AC">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="">
    
	<link rel="shortcut icon" href="http://www.samtinfo.ch/i19curand/i1ccurand_fav.png" type="image/x-icon">
	<link rel="icon" href="http://www.samtinfo.ch/i19curand/i1ccurand_fav.png" type="image/x-icon">
	<style>
		.divElement{
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    margin-top: -50px;
		    margin-left: -50px;
		    width: 100px;
		    height: 100px;
		}​
	</style>
</head>
<body>
	<h1>Register</h1>
	<div>
		<form action="#" method="POST">
			<table>
				<tr>
					<td>
						<label>Nome:</label>
					</td>
					<td>
						<input type="text" name="nome" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Cognome: </label>
					</td>
					<td>
						<input type="text" name="cognome" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Email:</label>
					</td>
					<td>
						<input type="text" name="email" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Password: </label>
					</td>
					<td>
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td>
						<label>Conferma password: </label>
					</td>
					<td>
						<input type="password" name="confPassword"><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>Admin: </label>
					</td>
					<td>
						<input type="checkbox" name="isAdmin"><br>
					</td>
				</tr>
			</table>
			<br><input type="submit">
		</form>
		<h3 style="color: red" id="errorRegister"></h3>
	</div>
	
</body>