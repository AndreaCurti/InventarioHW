<div class="d-flex justify-content-center pt-4 pb-4">
	<form action="<?php echo URL ?>changeEmail/change" method="POST">
		<table>
			<thead>
				<tr>
					<h1>Cambia email</h1>
				</tr>
			</thead>
			<tbody>
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
				<tr>
					<td colspan="2" style="text-align:center">
					<br>
						<input type="submit" class="btn btn-dark btn-lg" value="Accedi">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php if($this->errorMessage != ""){ ?>
	<h2 id="errorChangeEmail" style="text-align: center" class="alert alert-danger"> <?php echo $this->errorMessage ?></h2>
<?php } ?>