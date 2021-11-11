<h1>Cambia email</h1>
<form action="<?php echo URL ?>changeEmail/change" method="POST">
	<table>
		<tr>
			<td>
				<label>Vecchia email:</label>
			</td>
			<td>
				<input type="text" name="oldEmail" autocomplete="off">
			</td>
		</tr>
		<tr>
			<td>
				<br>
			</td>
		</tr>
		<tr>
			<td>
				<label>Nuova email:</label>
			</td>
			<td>
				<input type="text" name="newEmail" autocomplete="off">
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
		<tr>
			<td>
				<label>Password di conferma:</label>
			</td>
			<td>
				<input type="password" name="confPass" autocomplete="off">
			</td>
		</tr>
	</table>
	<input type="submit">
</form>
<h2 style="color: red" id="errorChangeEmail"></h2>