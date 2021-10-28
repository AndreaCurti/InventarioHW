<head>
	<title>DeleteUser</title>

	<!-- come titolo usare il nome del file-->
	<!-- quale browser uso?-->
	<!-- quale sistema operativo usato?-->
	<!-- data creazipone: 28.10.2021 ; data ultima modifica: 28.10.2021-->

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
	<h1>Rimuovi utente</h1>
	<div>
		<form action="<?php echo URL ?>deleteUser/delete" method="POST">
			<table>
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
						<label>Conferma email:</label>
					</td>
					<td>
						<input type="text" name="confEmail" autocomplete="off">
					</td>
				</tr>
			</table>
			<input type="submit">
		</form>
		<h2 style="color: red" id="errorDeleteUser"></h2>
	</div>
</body>