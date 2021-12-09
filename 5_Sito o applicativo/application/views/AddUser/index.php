<div class="d-flex justify-content-center pt-4 pb-4">
	<form action="<?php echo URL ?>addUser/registerUser" method="POST">
		<table>
			<thead>
				<tr>
					<h1>Aggiungi utente</h1>
				</tr>
			</thead>
			<tbody>
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
				<tr>
					<td colspan="2" style="text-align:center">
					<br>
						<input type="submit" class="btn btn-dark btn-lg" value="Aggiungi">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php if($this->errorMessage != ""){ ?>
	<h2 id="errorAddUser" style="text-align: center" class="alert alert-danger"> <?php echo $this->errorMessage ?></h2>
<?php } ?>

