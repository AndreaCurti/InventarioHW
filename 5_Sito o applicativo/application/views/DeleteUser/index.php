<h1>Rimuovi utente</h1>
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