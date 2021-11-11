<h1>Aggiungi utente</h1>
<form action="<?php echo URL ?>addUser/registerUser" method="POST">
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
<h3 style="color: red" id="errorAddUser"></h3>

